@extends('layout.app')

@section('content')
<h2 class="my-3">Nouveau Rapport</h2>
<div class="container my-5">
    <form action="{{ route('report.step.two') }}" method="post" class="section texte_noir" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <h3 class="texte_noir">Signature de l'inspecteur</h3>
                <canvas id="signatureCanvas1" width="300" height="200" style="border:1px solid #000;"></canvas>
                <br>
                <div class="text-center">
                    <button type="button" onclick="clearSignature1()" class="btn_del_signa">Effacer la signature</button>
                </div>
                <br><br>
                <input type="hidden" id="signatureData1" name="signatureData1">
            </div>
            <div class="col-md-6">
                <h3 class="texte_noir">Signature du locataire</h3>
                <canvas id="signatureCanvas2" width="300" height="200" style="border:1px solid #000;"></canvas>
                <br>
                <div class="text-center">
                    <button type="button" onclick="clearSignature2()" class="btn_del_signa">Effacer la signature</button>
                </div>
                <br><br>
                <input type="hidden" id="signatureData2" name="signatureData2">
            </div>
        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="btn_add_signa">Ajouter les Signatures</button>
        </div>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
<script>
    var signaturePad1 = new SignaturePad(document.getElementById('signatureCanvas1'));
    var signaturePad2 = new SignaturePad(document.getElementById('signatureCanvas2'));

    function clearSignature1() {
        signaturePad1.clear();
    }
    function clearSignature2() {
        signaturePad2.clear();
    }

    document.querySelector('form').addEventListener('submit', function (e) {
        var signatureData1 = signaturePad1.isEmpty() ? '' : signaturePad1.toDataURL();
        var signatureData2 = signaturePad2.isEmpty() ? '' : signaturePad2.toDataURL();

        document.getElementById('signatureData1').value = signatureData1;
        document.getElementById('signatureData2').value = signatureData2;
    });
</script>

@endsection
