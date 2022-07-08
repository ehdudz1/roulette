class Roulette {
    constructor() {
        this.itemcount = $('input[name="r_item[]"]').length;
        this.maxitemcount = 10;
    }
    rSubmit() {
        // 모든 item의 값확인
        let item_chk = true;

        $('input[name="r_item[]"]').each(function(index, item){
            if($(item).val() == ""){
                item_chk = false;

                return false;
            }
        });

        if(!item_chk){
            alert("모든 항목의 값을 입력해주세요.");
        }else {
            // 룰렛 돌리기 실행
            $('#roulette-form').prop('action','./result');

            // 받은 항목의 값을 json 형태로 localStorage에 저장.
            let item_arr = new Array();

            $('input[name="r_item[]"]').each(function(index, item){
                item_arr.push($(item).val());
            });

            window.localStorage.setItem('r_items', JSON.stringify(item_arr))
            $('#roulette-form').submit();
        }
    }
    addItem(){
        let r_item = "";
        let add_r_item = this.itemcount + 1;

        if(this.maxitemcount <= this.itemcount){
            alert("항목은 최대 10개까지 가능합니다.");
        }else {
            r_item += `<div class="form-floating mb-3" id="r-item-${add_r_item}">`;
            r_item += `    <input type="text" class="form-control rounded-3" name="r_item[]" data-index="${add_r_item}" placeholder="${add_r_item}번째 항목" style="width: 89%;">`;
            r_item += `    <label for="floatingPassword">${add_r_item}번째 항목</label>`;
            r_item += `    <button type="button" class="btn btn-outline-danger del-btn" data-index="${add_r_item}" style="position: absolute;top: 0px;right: 0px;width: 10%;height: 100%;">`;
            r_item += `        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">`;
            r_item += `            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"></path>`;
            r_item += `        </svg>`;
            r_item += `    </button>`;
            r_item += `</div>`;

            $(`#r-item-${this.itemcount}`).after(r_item);

            this.itemcount = add_r_item;
        }

        return;
    }
    delItem(t){
        if(t){
            $(`#r-item-${$(t).data('index')}`).remove();

            this.itemcount = $('input[name="r_item[]"]').length;
        }
    }
}
