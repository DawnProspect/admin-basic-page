<div class="container">


    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <!-- Validasi email dilakukan via backend, bukan type="email" -->
                                        <input type="text" class="form-control form-control-user"
                                            id="email"
                                            name="email"
                                            placeholder="Enter Email Address..."
                                            value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="passowrd" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration') ?>">Don't have an account? Create an Account here.</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>