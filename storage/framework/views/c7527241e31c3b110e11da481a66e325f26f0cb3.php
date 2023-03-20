<?php $__env->startSection('titele'); ?>Raport <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    .copied{
        color: red;
    }

</style>
<div class="text-center">
    <h3 class="mt-3 text-center ">Lucrarea: <?php echo e($file->title); ?></h3>
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
            Nr. de cuvinte total: <?php echo e($file->words); ?>

        </div>
    </div>
    <div class="card col-md-6">
        <div class="card-body">
            Nr. de caractere total: <?php echo e($file->characters); ?>

        </div>
    </div>
</div>
<h5 class="ml-3">Tabela Intersectii:</h5>
<table class="table ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">
            
            <label class="form-check-label" for="checkLucrare">
                Lucrarea
            </label>
        </th>
        <th scope="col">Pagina Controlata</th>
        <th scope="col">Pagina Copiata</th>
        <th scope="col">Segmente Controlat</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row" rowspan="<?php echo e($data['totalRows']+1); ?>"><?php echo e($key+1); ?></th>
                <td rowspan="<?php echo e($data['totalRows']+1); ?>" >
                    <input class="form-check-input mainCheck" id="name_<?php echo e($data['copy']['id']); ?>" idbd="<?php echo e($data['copy']['id']); ?>" type="checkbox" checked>
                    <label class="form-check-label" for="name_<?php echo e($data['copy']['id']); ?>">
                        <?php echo e($data['copy']['fileName']); ?>

                    </label>
                </td>
            </tr>
            <?php $__currentLoopData = $data['intersect']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $intersect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td rowspan="<?php echo e($intersect['totalKeys']+1); ?>">
                        <input class="form-check-input pageCheck" id="<?php echo e($data['copy']['id']); ?>_page_<?php echo e($key); ?>" idbd="<?php echo e($data['copy']['id']); ?>" page="<?php echo e($key); ?>" type="checkbox" checked>
                        <label class="form-check-label" for="<?php echo e($data['copy']['id']); ?>_page_<?php echo e($key); ?>">
                            <?php echo e($intersect['page']); ?>

                        </label>
                    </td>
                </tr>
                <?php $__currentLoopData = $intersect['keys']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($segment['copyPage']); ?>

                        </td>
                        <td>
                            <input class="form-check-input segmentCheck" id="<?php echo e($data['copy']['id']); ?>_page_<?php echo e($key); ?>_segment_<?php echo e($i); ?>" idbd="<?php echo e($data['copy']['id']); ?>" page="<?php echo e($key); ?>" val="<?php echo e($segment['value']); ?>" index="<?php echo e($i); ?>" type="checkbox" checked>
                            <label class="form-check-label" for="<?php echo e($data['copy']['id']); ?>_page_<?php echo e($key); ?>_segment_<?php echo e($i); ?>">
                                
                                <?php echo $segment['text']; ?>

                            </label>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<input type="hidden" id="exclude" value="<?php echo e($exclude); ?>">
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
    window.location.replace('<?php echo e(route("pdf-mini",$id)); ?>');
})
let generateRaportBig = document.querySelector('.raportBig')
generateRaportBig.addEventListener("click", function(){
    window.location.replace('<?php echo e(route("pdf-max",$id)); ?>');
})

let totalParts = <?php echo e($parts); ?>

let excludeList = JSON.parse(document.querySelector("#exclude").value)
let copyPartsValue = 0;

let segment = document.querySelectorAll(".segmentCheck")
segment.forEach(s => {
    let val = s.getAttribute("val")
    let fiended = false
    let element = excludeList['segments']
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
    let response = await fetch("<?php echo e($link); ?>", {
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/raport.blade.php ENDPATH**/ ?>