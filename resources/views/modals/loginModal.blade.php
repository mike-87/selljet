<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Prijava korisnika</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label for="username">Korisničko ime (email):</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <span class="text-danger username-remove">Morate uneti korisničko ime</span>
                </div>
                <div class="row">
                    <div class="col-4 mt-3">
                        <label for="password">Šifra:</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <span class="text-danger password-remove">Morate uneti šifru</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeLogin" data-dismiss="modal">Zatvori</button>
                <button type="button" class="btn btn-primary submitLogin">Prijava</button>
            </div>
        </div>
    </div>
</div>