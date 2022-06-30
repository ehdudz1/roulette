<?php include_once($_SERVER['DOCUMENT_ROOT']."/inc/header.php"); ?>
<script type="text/javascript">
    class Roulette {
        action(msg) {
            alert(msg);
        }
        add(){

        }
        del(){

        }
    }
$(document).ready(function () {
    roulette = new Roulette();

    $('#action-btn').on("click", function(){
        roulette.action('hi');
    });
});
</script>
        <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin" style="height: 100vh;">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h2 class="fw-bold mb-0">룰렛 생성기</h2>
                    </div>
                    <div class="modal-body p-5 pt-0">
                    <form class="">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="r_item[]" placeholder="첫번째 항목">
                            <label for="floatingInput">첫번째 항목</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="r_item[]" placeholder="두번째 항목">
                            <label for="floatingPassword">두번째 항목</label>
                        </div>
                        <button type="button" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                            항목추가
                        </button>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" id="action-btn" type="button">룰렛돌리기</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/inc/footer.php"); ?>
