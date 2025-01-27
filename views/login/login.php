<form method="POST" action="/boutique/login/authenticate">

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Se connecter</h5>
                        <form>
                            <div class="form-floating mb-3">
                                <input type="login" name="login" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Login</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Mot de passe</label>
                            </div>


                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Se
                                    connecter</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>