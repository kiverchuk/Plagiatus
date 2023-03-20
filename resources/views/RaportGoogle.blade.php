@extends('layout')
@section('titele')Raport @endsection

@section('content')
<style>
    .copied{
        color: red;
    }

</style>
<div class="text-center">
    <h3 class="mt-3 text-center ">Lucrarea: {{$file->title}}</h3>
</div>
<br>
<div  style="min-height: 39px; row">
    <center style="margin-bottom: -40px;"><h2 class="uniqiepercent">97.9 %</h2></center>
    <button type="button" class="saveSettings btn btn-success" style="float:left;" disabled>Salveaza</button>
    <span type="button" class="raportMini btn btn-info" style="float:right;">Raport Mini</span>
    <span type="button" class="raportBig btn btn-info" style="float:right;margin-right: 10px;">Raport Big</span>
</div>
<hr class="">
<div class="m-2 row">
    <div class="card col-md-6">
        <div class="card-body">
            Nr. de cuvinte total: {{$file->words}}
        </div>
    </div>
    <div class="card col-md-6">
        <div class="card-body">
            Nr. de caractere total: {{$file->characters}}
        </div>
    </div>
</div>
<h5 class="ml-3">Tabela Intersectii:</h5>
<table class="table ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">
            {{-- <input class="form-check-input checkLucrare" id="checkLucrare" type="checkbox" > --}}
            <label class="form-check-label" for="checkLucrare">
                Lucrarea
            </label>
        </th>
        <th scope="col">Pagina</th>
        <th scope="col">Segmente Controlate</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($dates as $key => $data)
            <tr>
                <th scope="row" rowspan="{{$data['totalRows']+1}}">{{$key+1}}</th>
                <td rowspan="{{$data['totalRows']+1}}" >
                    <input class="form-check-input mainCheck" id="name_{{$data['copy']['id']}}" idbd="{{$data['copy']['id']}}" url='{{$data['copy']['fileName']}}' type="checkbox" checked>
                    <label class="form-check-label" for="name_{{$data['copy']['id']}}" style="width: 400px;word-break: break-all;">
                        <a href="{{$data['copy']['fileName']}}" target="_blank">{{$data['copy']['fileName']}}</a>
                    </label>
                </td>
            </tr>
            @foreach ($data['intersect'] as $key => $intersect)
                <tr>
                    <td rowspan="{{$intersect['totalKeys']+1}}">
                        <input class="form-check-input pageCheck" id="{{$data['copy']['id']}}_page_{{$key}}" idbd="{{$data['copy']['id']}}" page="{{$key}}" type="checkbox" checked>
                        <label class="form-check-label" for="{{$data['copy']['id']}}_page_{{$key}}">
                            {{$intersect['page']}}
                        </label>
                    </td>
                </tr>
                @foreach($intersect['keys'] as $i => $segment)
                    <tr>
                        <td>
                            <input class="form-check-input segmentCheck" id="{{$data['copy']['id']}}_page_{{$key}}_segment_{{$i}}" idbd="{{$data['copy']['id']}}" page="{{$key}}" val="{{$segment['value']}}" index="{{$i}}" type="checkbox" checked>
                            <label class="form-check-label" for="{{$data['copy']['id']}}_page_{{$key}}_segment_{{$i}}">
                                {{-- {!!$segment['textPre']!!} <p class='copied'> {{$segment['data']}} </p> {{$segment['textPost']}} --}}
                                {!! $segment['text'] !!}
                            </label>
                        </td>
                    </tr>
                @endforeach
            @endforeach
      @endforeach
    </tbody>
  </table>
<input type="hidden" id="exclude" value="{{$exclude}}">
<script>
const clamp = (num, min, max) => Math.min(Math.max(num, min), max);
function needSave(bool){
    let saveSettings = document.querySelector('.saveSettings')
    if(bool)
    {
        window.onbeforeunload = function (e) {
            e = e || window.event;
            // For IE and Firefox prior to version 4
            if (e) {
                e.returnValue = 'Sure?';
            }
            // For Safari
            return 'Sure?';
        };
        //saveSettings.style.display = "block"
        saveSettings.removeAttribute("disabled")
    }
    else
    {
        window.onbeforeunload = null;
        //saveSettings.style.display = "none"
        saveSettings.setAttribute("disabled", "disabled")
    }
}

let saveSettings = document.querySelector('.saveSettings')
saveSettings.setAttribute("disabled", "disabled")
saveSettings.addEventListener("click", function(){
    needSave(false)
    sendData();
})

let generateRaportMini = document.querySelector('.raportMini')
generateRaportMini.addEventListener("click", function(){
    window.location.replace('{{route("pdf-mini-g",$id)}}');
})
let generateRaportBig = document.querySelector('.raportBig')
generateRaportBig.addEventListener("click", function(){
    window.location.replace('{{route("pdf-max-g",$id)}}');
})

let totalParts = {{$parts}}
let excludeList = JSON.parse(document.querySelector("#exclude").value)
let copyPartsValue = 0;

let segment = document.querySelectorAll(".segmentCheck")
segment.forEach(s => {
    let val = s.getAttribute("val")
    let fiended = false
    let element = excludeList['segments']
    console.log(s)
    if(element){
        element = element[s.getAttribute("idbd")]
        if(element){
            fiended = element.includes(s.getAttribute("index"));
        }
    }
    if(fiended)
        s.checked = !fiended
    else
        copyPartsValue += parseInt(val)
    calcPercent()
    s.addEventListener("click", function(e){
        let val = e.target.getAttribute("val")
        if(e.target.checked){
            copyPartsValue += parseInt(val)
        }
        else{
            copyPartsValue -= parseInt(val)
        }
        calcPercent()
        needSave(true)
    })
})

let main = document.querySelectorAll(".mainCheck")
main.forEach(m=>{
    let element = excludeList['fileIds'];
    if(element){
        let fiended = element.includes(m.getAttribute("idbd"));
        console.log(fiended)
        if(fiended){
           m.checked = false
           let id = m.getAttribute("idbd")
           enableAllPage(id,false, 0)
        }
    }

    m.addEventListener("click", function(e){
        let id = e.target.getAttribute("idbd")
        let cheked =  e.target.checked;
        enableAllPage(id,cheked, 0)
    })
})
let page = document.querySelectorAll(".pageCheck")
page.forEach(p => {
    p.addEventListener("click", function(e){
        let id = e.target.getAttribute("idbd")
        let cheked = document.querySelector(".mainCheck[idbd='"+id+"']").checked
        let page = e.target.getAttribute("page")
        let pCheked =  e.target.checked;
        enableAllSegment(id, page, cheked, pCheked, 1)
    })
})



function enableAllPage(id, cheked, i){
    let pages = document.querySelectorAll(".pageCheck[idbd='"+id+"']")
    pages.forEach(p=>{
        if(cheked)
        {
            p.removeAttribute("disabled")
            p.style.display = 'block'
        }
        else
        {
            p.setAttribute("disabled", "disabled")
            p.style.display = 'none'
        }

        let page = p.getAttribute("page")
        let pCheked = p.checked;
        enableAllSegment(id, page, cheked, pCheked, i)
    })
}
function enableAllSegment(id, page, cheked, pCheked, i){
    let segments = document.querySelectorAll(".segmentCheck[idbd='"+id+"'][page='"+page+"']")
    segments.forEach(s=>{
        if(cheked && pCheked)
        {
            s.style.display = 'block'
            s.removeAttribute("disabled")
        }
        else{
            s.setAttribute("disabled", "disabled")
            s.style.display = 'none'
        }
        let val = s.getAttribute("val")
        if(i == 1)
        {
            if(s.checked)
                copyPartsValue += cheked && pCheked? parseInt(val) : -parseInt(val)
        }
        else
            if(pCheked)
                if(s.checked)
                    copyPartsValue += cheked? parseInt(val) : -parseInt(val)
        calcPercent();
    })
    needSave(true)
}

function calcPercent(){
    let percent = document.querySelector(".uniqiepercent");
    let currentpercent = 100 - (copyPartsValue/totalParts) * 100
    currentpercent = Number((currentpercent).toFixed(2))
    currentpercent = clamp(currentpercent, 0, 100);
    percent.innerHTML = currentpercent+" %"
}

function constructSendArray(){
    let data = {}
    data['segments'] = {}
    let mainIds = []
    main.forEach(m=>{
        let id = m.getAttribute("idbd")
        let url = m.getAttribute("url")
        if(!m.checked)
            mainIds.push(id)
        else{
            //mainIds.push(id)
            let segmentsIds = []
            let segments = document.querySelectorAll(".segmentCheck[idbd='"+id+"']")
            segments.forEach(s=>{
                if(!s.checked)
                {
                    let index = s.getAttribute("index")
                    segmentsIds.push(index)
                }else{
                    let pageNum = s.getAttribute("page")
                    let page = document.querySelector(".pageCheck[idbd='"+id+"'][page='"+pageNum+"']")
                    console.log(page)
                    if(!page.checked){
                        let index = s.getAttribute("index")
                        segmentsIds.push(index)
                    }
                }
            })
            if(segmentsIds.length > 0)
                data['segments'][id] = segmentsIds
        }
    })
    data['mainIds'] = mainIds
    return JSON.stringify(data);
}

async function sendData(){
    let response = await fetch("{{$link}}", {
        method: 'POST',
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        body: constructSendArray(),
    });
    response.json().then(data => {
      console.log(data);
    });
}
needSave(false)

</script>

@endsection
