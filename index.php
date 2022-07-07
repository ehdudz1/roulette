<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>룰렛 만들기</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="./lib/js/Roulette.js"></script>
    </head>
    <body>
        <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin" style="height: 100vh;">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0" style="display: block;">
                        <h2 class="fw-bold mb-0" style="text-align: center!important;">룰렛 만들기</h2>
                    </div>
                    <div class="modal-body p-5 pt-0">
                    <form id="roulette-form" method="post">
                        <div class="form-floating mb-3" id="r-item-1">
                            <input type="text" class="form-control rounded-3" name="r_item[]" data-index="1" placeholder="1번째 항목">
                            <label for="floatingInput">1번째 항목</label>
                        </div>
                        <div class="form-floating mb-3" id="r-item-2">
                            <input type="text" class="form-control rounded-3" name="r_item[]" data-index="2" placeholder="2번째 항목">
                            <label for="floatingPassword">2번째 항목</label>
                        </div>
                        <button type="button" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" id="add-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                            항목추가
                        </button>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" id="submit-btn" type="button">만들기</button>
                        <input type="color" name="" value="">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        const roulette = new Roulette();

        $('#submit-btn').on("click", function(){
            roulette.rSubmit('submit');
        });

        $('#add-btn').on("click", function(){
            roulette.addItem();
        });

        $(document).on("click", '.del-btn', function() {
            roulette.delItem(this);
        });
    });
</script>
