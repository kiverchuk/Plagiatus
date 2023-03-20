<!DOCTYPE html>
<html>
<head>
    <title>Raport</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2"/>
</head>
<body>
    <div style="float: left;">
        
    </div>
    <h1 style="text-align: center;">
        <?php if($mini): ?>
            Raport De Plagiarism Minimizat
        <?php else: ?>
            Raport De Plagiarism Extins
        <?php endif; ?>
    </h1>
    <br>
    <div class="shortData">
        <div style="float: right;margin-right: 10px;">
            <span class="red">DATA RAPORTULUI: </span><span><?php echo e($date); ?></span>
        </div>
        <br>
        <div class="mb-2">
            <span class="red">Titlu:</span><br><span><?php echo e($name); ?></span>
        </div>
        <div class="row mb-2">
            <div class="column">
                <span class="red">AUTOR:</span><br><span><?php echo e($author); ?></span>
            </div>
            <div class="column">
                <span class="red">COORDONATOR:</span><br><span><?php echo e($coordinator); ?></span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="column">
                <span class="red">UNITATE ORGANIZAȚIONALĂ:</span><br><span><?php echo e($organizationunit); ?></span>
            </div>
            <div class="column">
                <span class="red">DATA ÎNCĂRCĂRII:</span><br><span><?php echo e($created); ?></span>
            </div>
        </div>
        <div class="row mb-2">
            <div class="column">
                <span class="red">PAGINI EXCLUSE DIN VERIFICARE:</span><br>
                <span>
                <?php if(empty($pagExclude)): ?>
                    Nu au fost pagini excluse
                <?php else: ?>
                    <?php echo e($pagExclude); ?>

                <?php endif; ?>
                </span>
            </div>

        </div>
    </div>
    <br>
    <div>
        <span class="box"></span>
        <p class="red mi dib" style="">Detalii Lucrare</p>
        <p class="red2 mi fs11">Datele au fost colectate și calculate conform paginilor excluse și în urma prelucrării textului pentru vereficarea la plagiarism.</p>
        
        <p>Lungimea in cuvinte <?php echo e($words); ?></p>
        <p>Lungimea in caractere <?php echo e($characters); ?></p>
        <p>Nr de cuvinte cu caractere din diferite limbi <span class="fs11">(poate indica o tentativă de evitare a detectării)</span>: <?php echo e($strangeLetters); ?></p>
    </div>
    <br>
    <div>
        <span class="box"></span>
        <p class="red mi dib" style="">Rezultate Similitudini</p>
        <p class="red2 mi fs11">Vă rugăm să aveți în vedere faptul că valori ridicate ale coeficienților nu indică automat plagiat. Raportul trebuie să fie analizat de o persoană autorizată.</p>
        <br>
        <div class="percent" style="margin:auto;">
            <?php echo e($percent); ?>

        </div>
        <p class="fs11" style="text-align: center;">% din cuvinte indicate în fragmente de <?php echo e($shLength); ?> cuvinte</p>
    </div>
    <?php if(count($intersection) > 0): ?>
        <div>
            <span class="box"></span>
            <p class="red mi dib" style="">Detalii Similitudini</p>
            <p class="red2 mi fs11">Vă rugăm să aveți în vedere faptul că valori ridicate ale coeficienților nu indică automat plagiat. Raportul trebuie să fie analizat de o persoană autorizată.</p>
        </div>
        <?php if($mini): ?>
            <br>
            <table>
                <tr>
                    <th colspan="3">Titlu Lucrare</th>
                    <th>Intersectie (%)</th>
                </tr>
                <?php $__currentLoopData = $intersection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intersect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td colspan="3" style="overflow-wrap: anywhere;"><?php echo e($intersect['name']); ?></td>
                        <td><?php echo e($intersect['percent']); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        <?php else: ?>
            <br>
            <?php $__currentLoopData = $intersection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span><?php echo e($key+1); ?>. </span><span style="overflow-wrap: anywhere;"><b><?php echo e($data['copy']['fileName']); ?></b></span>
                <br>
                <table style="margin-top:5px;">
                    <tr>
                        <td style="text-align:center;">Pagina</td>
                        <td style="text-align:center;">%</td>
                        <td>Fragment</td>
                    </tr>
                <?php $__currentLoopData = $data['intersect']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $intersect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $intersect['keys']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="width: 50px; text-align:center;"><?php echo e($page); ?></td>
                            <td style="width: 50px; text-align:center;"><?php echo e(round($key['value']/$words*100, 2)); ?></td>
                            <td><?php echo $key['text']; ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endif; ?>


    <style>
    .page-break {
        page-break-after: always;
    }
    .copied{
        color: red;
    }
    #resp-table {
        width: 100%;
        display: table;
    }
    #resp-table-body{
        display: table-row-group;
    }
    .resp-table-row{
        display: table-row;
    }
    .table-body-cell{
        display: table-cell;
        border: 1px solid #dddddd;
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
    }
    h1{
        margin-bottom: 5px;
    }
    table {
        /* font-family: arial, sans-serif; */
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
    body, p, span{
        font-family: Dejavu Sans;
    }
    }
    .red{
        color: rgb(235, 0, 0);
        font-weight: bold;
    }
    .red2{
        color: rgb(235, 0, 0);
    }
    .shortData{
        padding: 10px 10px 10px 20px;
        border-radius: 5px;
        /* background-image: linear-gradient(180deg, rgb(150 150 150 / 50%) 0%, rgb(150 150 150 / 50%) 60%, rgb(255 255 255) 100%); */
        background: #c5c5c594;
    }
    .column {
        float: left;
        width: 50%;
    }
    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    .mb-2{
        margin-bottom: 5px;
    }
    .mi{
        margin: inherit;
    }
    .box{
        width: 13px;
        height: 13px;
        background: rgb(175, 0, 0);
        border-radius: 3px;
        margin-right: 5px;
        margin-bottom: 3px;
        display: inline-block;
    }
    .dib{
        display: inline-block;
    }
    .fs11{
        font-size: 11px;
    }
    .percent{
        font-size: 12px;
        width: 45px;
        height: 45px;
        font-weight: bold;
        color: grey;
        border: 3px solid grey;
        border-radius: 50%;
        text-align: center;
        vertical-align: middle;
        line-height: 40px;
    }
</style>
</body>
</html>
<?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/pdf1.blade.php ENDPATH**/ ?>