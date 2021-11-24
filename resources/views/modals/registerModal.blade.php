<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Registracija korisnika</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <label for="fname">Ime:</label>
                        <input type="text" name="fname" id="fname">
                    </div>
                    <span class="text-danger fname-remove">Morate uneti ime</span>
                </div>
                <div class="row">
                    <div class="col-4 mt-3">
                        <label for="lname">Prezime:</label>
                        <input type="text" name="lname" id="lname">
                    </div>
                    <span class="text-danger lname-remove">Morate uneti prezime</span>
                </div>
                <div class="row">
                    <div class="col-4 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <span class="text-danger email-remove">Email nije u odgovarajućem formatu</span>
                </div>
                <div class="row">
                    <div class="col-4 mt-3">
                        <label for="pass">Šifra:</label>
                        <input type="password" name="pass" id="pass">
                    </div>
                    <span class="text-danger pass-remove">Šifre se ne poklapaju</span>
                </div>
                <div class="row">
                    <div class="col-4 mt-3">
                        <label for="repeatPass">Ponovite šifru:</label>
                        <input type="password" name="repeatPass" id="repeatPass">
                        
                    </div>
                    <span class="text-danger repeatPass-remove">Šifre se ne poklapaju</span>
                    <span class="text-danger matchPass-remove mt-2">Šifre se ne poklapaju</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeRegister" data-dismiss="modal">Zatvori</button>
                <button type="button" class="btn btn-primary submitRegister">Sačuvaj</button>
            </div>
        </div>
    </div>
</div>