<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        
    </head>

    <body class="antialiased">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-5">
                    <div class="card">
                        <div class="card-header">Digital Signature Form</div>
                        <div class="card-body">
                            @if(session('alert-success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('alert-success') }}
                                </div>
                            @endif
                            <form action="{{ route('send.signature') }}" method="post">
                                @csrf
                                <div class="form-froup">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter name" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label>Draw signature</label>
                                    <div id="signature-pad" class="signature-pad">
                                        <div class="signature-pad-body">
                                            <canvas></canvas>
                                        </div>
                                        <div class="signature-pad-footer" style="text-align: right">
                                            <button type="button" id="clear-signature" class="btn btn-danger">
                                                Clear
                                            </button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="signature" id="signature" value="">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">
                                    {{ __('Submit') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
        <script>
            var canvas = document.querySelector("canvas");
            var signaturePad = new SignaturePad(canvas);
            
            document.getElementById('clear-signature').addEventListener('click',function(){
                signaturePad.clear();
            });

            document.querySelector('form').addEventListener('submit',function(e){
                var signatureInput = document.getElementById('signature');
                if(signaturepad.isEmpty()){
                    e.preventDefault();
                    alert('Please draw your signature.');
                } else{
                    signatureInput.value = signaturePad.toDataURL();
                }
            });
        </script>
        
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
