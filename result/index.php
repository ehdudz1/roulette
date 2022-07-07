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

        <script type="text/javascript" src="./Winwheel.js"></script>
        <script src="../lib/js/html2canvas.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    </head>
    <body>
        <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin" style="height: 100vh;">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0" style="display: block;">
                        <h2 class="fw-bold mb-0" style="text-align: center!important;">룰렛 만들기</h2>
                    </div>
                    <div class="modal-body p-5 pt-0">
                        <div id="roulette-result">
                            <div id="Pointer" style="text-align:center;">
                                <span style="font-size: 1.5em;">▼</span>
                            </div>
                            <canvas id="canvas" width="434" height="434" style="display: inline-block;width: 100%;height: 100%;">
                                <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                            </canvas>
                        </div>

                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="button" id="start-btn" style="margin-top: 5px;">돌리기</button>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary disabled" type="button" id="reset-btn">다시하기</button>
                        <a href="../" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary">처음으로</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 결과 Modal -->
        <button type="button" id="exampleModal-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display:none">
            Launch demo modal
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel" style="margin: 0px auto 0px auto;">&#127881; 결과 : <span id="roulette-result-msg"></span> &#127881;</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
              </div>
              <!-- <div class="modal-body">
                  <div id="roulette-result-image">

                  </div>
              </div> -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                <!-- <button type="button" class="btn btn-primary" id="save-btn">저장</button> -->

                <button type="button" class="btn btn-primary" id="save-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"></path>
                    </svg>
                    저장
                </button>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#start-btn').on("click", function(){
            $('#start-btn').addClass('disabled');
            startSpin();
        });

        $('#reset-btn').on("click", function(){
            $('#reset-btn').addClass('disabled');
            $('#start-btn').removeClass('disabled');
            resetWheel();
        });

        $('#save-btn').on("click", function(){
            PrintDiv($('#roulette-result'));
        });
    });

    function PrintDiv(div){
        let today = new Date();

        let year = today.getFullYear();
        let month = ('0' + (today.getMonth() + 1)).slice(-2);
        let day = ('0' + today.getDate()).slice(-2);

        let dateString = year + '_' + month  + '_' + day;

        div = div[0];
        html2canvas(div).then(function(canvas){
            let myImage = canvas.toDataURL();
            downloadURI(myImage, "룰렛결과" + dateString + ".png");
        });
    }
    function PrintDiv2(div){
        div = div[0]
        html2canvas(div).then(function(canvas){
            let myImage = canvas.toDataURL();
            $('#roulette-result-image').css({"background":"url("+myImage+")"});
            // $('#roulette-result-image').html(myImage);
        });
    }
    function downloadURI(uri, name){
        let link = document.createElement("a")
        link.download = name;
        link.href = uri;
        document.body.appendChild(link);
        link.click();
    }
    function getRandomColor(){
        let color_arr = new Array();

        for (let i = 0; i < 20; i++) {
            color_arr[i] = '#' + Math.floor(Math.random()*16777215).toString(16);
        }

        return color_arr;
    }
</script>

<script>
    // Winhweel.js basic code wheel example by Douglas McKechie @ www.dougtesting.net
    // See website for tutorials and other documentation.
    //
    // The MIT License (MIT)
    //
    // Copyright (c) 2016 Douglas McKechie
    //
    // Permission is hereby granted, free of charge, to any person obtaining a copy
    // of this software and associated documentation files (the "Software"), to deal
    // in the Software without restriction, including without limitation the rights
    // to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    // copies of the Software, and to permit persons to whom the Software is
    // furnished to do so, subject to the following conditions:
    //
    // The above copyright notice and this permission notice shall be included in all
    // copies or substantial portions of the Software.
    //
    // THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    // IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    // FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    // AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    // LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    // OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    // SOFTWARE.

    // Create new wheel object specifying the parameters at creation time.

    // Define segments including colour and text.
    let segments_tmp = JSON.parse(window.localStorage.getItem('r_items'));
    let segments_arr = new Array();
    // let segments_color = ['red','yellow','blue','green','orange','purple','skyblue','pink','gray'];
    // let segments_color = ['#ff8989','#ffd760','#6ea9ff','#67ffb8','#ffa451','#ed77ff','#82a6ff','#ff95e6'];
    let segments_color = getRandomColor();

    segments_tmp.forEach(function (item, index, array) {
        // color array를 미리생성 후 룰렛을생성할때 랜덤으로 뽑아옴
        segments_color.sort(()=> Math.random() - 0.5);

        let segments_item = {
            'fillStyle' : segments_color.pop(), 'text' : item
        }
        segments_arr.push(segments_item);
    })

    let theWheel = new Winwheel({
        'numSegments'  : segments_arr.length,     // Specify number of segments.
        'outerRadius'  : 212,   // Set outer radius so wheel fits inside the background.
        'textFontSize' : 25,    // Set font size as desired.,
        'textOrientation' : 'vertical',
        'segments'     : segments_arr,
        'animation' :           // Specify the animation to use.
        {
            'type'     : 'spinToStop',
            'duration' : 3,     // Duration in seconds.
            'spins'    : 8,     // Number of complete spins.
            'callbackFinished' : alertPrize,
        },
        'pointerGuide' :        // Specify pointer guide properties.
        {
            'display'     : true,
            'strokeStyle' : 'red',
            'lineWidth'   : 1
        }
    });
    // lets used by the code in this page to do power controls.
    let wheelPower    = 0;
    let wheelSpinning = false;

    // -------------------------------------------------------
    // Function to handle the onClick on the power buttons.
    // -------------------------------------------------------
    function powerSelected(powerLevel)
    {
        // Ensure that power can't be changed while wheel is spinning.
        if (wheelSpinning == false) {
            // Reset all to grey incase this is not the first time the user has selected the power.
            document.getElementById('pw1').className = "";
            document.getElementById('pw2').className = "";
            document.getElementById('pw3').className = "";

            // Now light up all cells below-and-including the one selected by changing the class.
            if (powerLevel >= 1) {
                document.getElementById('pw1').className = "pw1";
            }

            if (powerLevel >= 2) {
                document.getElementById('pw2').className = "pw2";
            }

            if (powerLevel >= 3) {
                document.getElementById('pw3').className = "pw3";
            }

            // Set wheelPower let used when spin button is clicked.
            wheelPower = powerLevel;

            // Light up the spin button by changing it's source image and adding a clickable class to it.
            // document.getElementById('spin_button').src = "spin_on.png";
            // document.getElementById('spin_button').className = "clickable";
        }
    }

    // -------------------------------------------------------
    // Click handler for spin button.
    // -------------------------------------------------------
    async function startSpin()
    {
        // Ensure that spinning can't be clicked again while already running.
        if (wheelSpinning == false) {
            // Based on the power level selected adjust the number of spins for the wheel, the more times is has
            // to rotate with the duration of the animation the quicker the wheel spins.
            if (wheelPower == 1) {
                theWheel.animation.spins = 3;
            } else if (wheelPower == 2) {
                theWheel.animation.spins = 8;
            } else if (wheelPower == 3) {
                theWheel.animation.spins = 15;
            }

            // Disable the spin button so can't click again while wheel is spinning.
            // document.getElementById('spin_button').src       = "spin_off.png";
            // document.getElementById('spin_button').className = "";

            // Begin the spin animation by calling startAnimation on the wheel object.
            theWheel.startAnimation();

            // Set to true so that power can't be changed and spin button re-enabled during
            // the current animation. The user will have to reset before spinning again.
            wheelSpinning = true;


            let promise = new Promise((resolve, reject) => {
                setTimeout(() => resolve(true), theWheel.animation.duration * 1000);
            });

            let result = await promise; // 프라미스가 이행될 때까지 기다림 (*)

            if(result){
                $('#reset-btn').removeClass('disabled');
            }
        }
    }

    // -------------------------------------------------------
    // Function for reset button.
    // -------------------------------------------------------
    function resetWheel()
    {
        theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
        theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
        theWheel.draw();                // Call draw to render changes to the wheel.

        // document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
        // document.getElementById('pw2').className = "";
        // document.getElementById('pw3').className = "";

        wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
    }

    // -------------------------------------------------------
    // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters
    // note the indicated segment is passed in as a parmeter as 99% of the time you will want to know this to inform the user of their prize.
    // -------------------------------------------------------
    function alertPrize(indicatedSegment)
    {
        // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
        // PrintDiv($('.modal-content.rounded-4.shadow'));
        PrintDiv2($('#roulette-result'));
        $('#exampleModal-btn').click();
        $('#roulette-result-msg').text(indicatedSegment.text);
    }
</script>
