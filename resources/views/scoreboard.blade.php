<html>
  <head>
    <title>Scoreboard</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
      .jumbotron {
  background-color: transparent;
}

#app {
  min-width: 247px;
}

.wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
}

body {
  background-color: #90b9f9;
}

.text-center {
  color: #e5e5e5;
}

header {
  background-color: #4385ef;
  padding: 10px 90px 15px 90px;
  border-radius: 15px;
  color: #2c4b7c;
  width: 613px;
  margin: 0 auto;
  margin-top: -20px;
  margin-bottom: 2em;
  box-shadow: inset 0px -5px 1px #234d8e, 6px 7px 3px rgba(66, 66, 66, 0.5);
  & h1 {
    font-family: rubik;
    font-weight: 800;
    user-select: none;
  }
}

.scorecontainer {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 40em;
  width: 80%;
  margin-left: 10%;
  background-color: #4385ef;
  padding: 10px 90px 15px 90px;
  border-radius: 10px;
  position: absolute;
  z-index: -10;
  box-shadow: inset 0px -5px 1px #234d8e, 6px 7px 3px rgba(66, 66, 66, 0.5);
}

.btn {
  width: 300px;
  margin-top: 0px;
  cursor: default;
  height: 300px;
  border: 0;
  border-radius: 20px;
  outline: none !important;
  font-size: 200px;
  font-family: rubik;
  text-shadow: 3px 3px 5px;
  display: block;
  position: relative;
  z-index: 5;
  top: 15px;
}

#home {
  background-color: #e85c5c;
  box-shadow: inset 0 -5px 1px #842f2f, 6px 7px 3px rgba(66, 66, 66, 0.5);
}

#away {
  background-color: #60e85c;
  box-shadow: inset 0 -5px 1px #37842f, 6px 7px 3px rgba(66, 66, 66, 0.5);
}

.btncontainer {
  display: inline-block;
  margin: 0 45px 20px 45px;
  text-align: center;
  & h2 {
    font-family: rubik;
    font-size: 30px;
    background-color: #f7ff66;
    color: #383838;
    border-radius: 10px;
    font-weight: 800;
    padding: 10px 15px 15px 15px;
    box-shadow: inset 0 -5px 1px #5a5e11, 6px 7px 3px rgba(66, 66, 66, 0.5);
  }
}
h2 {
    font-family: rubik;
    font-size: 30px;
    background-color: #f7ff66;
    color: #383838;
    border-radius: 10px;
    font-weight: 800;
    padding: 10px 15px 15px 15px;
    box-shadow: inset 0 -5px 1px #5a5e11, 6px 7px 3px rgba(66, 66, 66, 0.5);
  }
.scorebtn {
  background-color: #5e5e5e;
  color: #ddd;
  display: inline-block;
  padding-top: 10px;
  font-size: 45px;
  border-radius: 10px;
  box-shadow: inset 0 -4px 1px #383838, 4px 4px 3px rgba(66, 66, 66, 0.5);
  border: 0;
  top: -10px;
  margin: 0px 10px 0px 10px;
  width: 80px;
  height: 80px;
  transition: 0.5s;
  &:active {
    box-shadow: none;
  }
  &:focus {
    outline: none;
  }
}

#rounddisplay {
  background-color: #383838;
  text-align: center;
  border-radius: 10px;
  width: 70px;
  padding: 15px 10px 10px 10px;
  & p {
    color: #ffffff;
    font-family: rubik;
    &:nth-child(1) {}
    &:nth-child(2) {
      font-size: 50px;
    }
  }
}

#roundcounter {
  border-radius: 5px;
  margin-bottom: 35px;
}

#roundplus,
#roundminus {
  background-color: #383838;
  margin: 0 auto;
  border-radius: 5px;
  text-align: center;
  font-size: 30px;
  height: 50px;
  color: #ddd;
  width: 100%;
  border: none;
  transition: 0.5s;
  &:focus {
    outline: none;
  }
  & span {
    transition: 0.5s;
  }
}

#roundplus {
  margin-bottom: -20px;
  width: 70px;
  border-bottom-left-radius: 0;
  border-bottom: 10px #383838 solid;
  border-bottom-right-radius: 0;
}

#roundminus {
  margin-top: -15px;
  width: 70px;
  box-shadow: inset 0px -4px 1px #232323;
  &:active {
    box-shadow: none;
  }
}

@media (max-width: 1030px) {
  .btn {
    width: 250px;
    height: 250px;
    font-size: 170px;
  }
  #roundcounter {
    width: 60px;
  }
  .btncontainer {
    margin: 0 30px -30px 30px;
    height: 480px;
  }
  .scorecontainer {
    height: 470px;
  }
}

@media (max-width: 850px) {
  .btn {
    width: 230px;
    height: 230px;
    font-size: 150px;
  }
  .btncontainer {
    display: block;
    margin-bottom: -20px;
    margin-left: 20px;
    margin-right: 15px;
  }
  .scorecontainer {
    width: 90%;
    margin-left: 5%;
    height: 470px;
  }
}

@media (max-width:655px) {
  .btn {
    height: 210px;
    width: 210px;
    font-size: 140px;
  }
  header {
    width: 80%;
  }
  .btncontainer {
    height: 400px;
    margin-top: 10px;
  }
  .scorecontainer {
    height: auto;
  }
}

@media (max-width:585px) {
  header {
    width: 90%;
    margin-top: -10px;
    padding: 1px 0 10px 0px;
    margin-bottom: 15px;
    & h1 {
      margin-top: 20px;
    }
  }
  .scorecontainer {
    flex-direction: column;
    align-items: right;
    height: auto;
  }
  .btn {
    width: 300px;
  }
  .btncontainer {
    display: inline-block;
    width: auto;
    margin: 0;
    height: 440px;
  }
  #roundcounter {
    display: flex;
    border-radius: 0;
    width: 303px !important;
    margin: 0;
  }
  #roundplus,
  #roundminus {
    margin: 0;
    height: 80px;
    border-radius: 0;
    box-shadow: none;
    transition: 0s;
    width: 1000px !important;
  }
  #roundplus {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
    border: 0;
  }
  #roundminus {
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
  }
  #rounddisplay {
    height: 80px;
    padding: 5px;
    margin: 0;
    border-radius: 0;
    & p {
      color: #ffffff;
      font-family: rubik;
      &:nth-child(1) {
        margin: 0;
        display: block;
      }
      &:nth-child(2) {
        font-size: 40px;
        display: inline-block;
      }
    }
  }
}
    p {
      color: #ffffff;
      font-family: rubik;
      &:nth-child(1) {
        margin: 0;
        display: block;
      }
@media (max-width: 400px) {
  header {
    min-width: 276px;
    margin-left: 18px;
  }
  .scorecontainer {
    padding: 20px;
    min-width: 276px;
  }
  .btncontainer {
    width: 99%;
    height: auto;
    margin-bottom: 15px;
  }
  .btn {
    width: 240px;
    height: 220px;
    margin: 0 auto;
    font-size: 120px;
  }
  #roundcounter {
    width: 90% !important;
  }
}

@media (max-width: 320px) {
  header {
    margin: 0 auto;
    margin-bottom: 10px;
    margin-top: -10px;
    & h1 {
      font-size: 25px;
    }
  }
  .scorecontainer {
    margin: 0;
    width: 100%;
  }
  .btn {
    width: 200px;
    height: 200px;
  }
}
#menit {
    width: 100%;
    text-align: center;
    font-size: 2em;
    margin-bottom: 0.2em;
    margin-top: -0.6em;
}
      #clockdiv{
      font-family: sans-serif;
      color: #fff;
      display: inline-block;
      font-weight: 100;
      text-align: center;
      font-size: 30px;
      }
      #clockdiv > div{
          padding: 10px;
          border-radius: 3px;
          background: #00BF96;
          display: inline-block;
      }
      #clockdiv div > span{
          padding: 15px;
          border-radius: 3px;
          background: #00816A;
          display: inline-block;
      }
      .smalltext{
          padding-top: 5px;
          font-size: 16px;
      }
      .twodigit{
          background-color:#000;
        width:5%;
        height: 60px;
        margin-left: 575px;
          margin-right:90px;
        margin-top:-75px;
          top:50%; 
        border:2px solid white;
        text-align:center;
      }
      
    </style>
  </head>
  <body>

  <div>
  <header>
    <h1 class="text-center"style="color:yellow;">Futsal Scoreboard</h1>
  </header>
  <div class="scorecontainer">
    <div class="btncontainer">
      <h2 id="name_home">Home</h2>
      <div class="btn" id="home">0</div>
      </br></br>
      <div id="rounddisplay">
        <p>Fouls</p>
        <h2 id="foul_home">0</h2>
      </div>
    </div>
    <div id="roundcounter">
    <div class="timer"></div>
    <div id="rounddisplay">
  <div class="twodigit" style="color:yellow; font-size:40px;" id="menit">00</div>
  <div class="nexttwodigit" style="color:yellow; font-size:40px;" id="detik">00</div>
    </div> 
      <div id="rounddisplay">
        <p>Period</p>
        <h2 id="period">0</h2>
      </div>
    </div>
    
    <div class="btncontainer">
      <h2 id="name_away">Away</h2>
      <div class="btn" id="away">0</div>
    </br></br>
      <div id="rounddisplay" style="margin: 00px 0 0 225px;">
        <p>Fouls</p>
        <h2 id="foul_away">0</h2>
      </div>
    </div>
  </div>
  
</div>
<div class="test" id="timer" style="display:none"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var stop;
var menit;
var detik;
//sse
    if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("/scoreboard-sse");
        source.onmessage = function(event) {
        console.log(event.data);
        $val = JSON.parse(event.data);
        console.log($val.status);
        document.getElementById("period").innerHTML= $val.period;
        document.getElementById("home").innerHTML= $val.home;
        document.getElementById("name_home").innerHTML= 'Tim '+ $val.name_home;
        document.getElementById("foul_home").innerHTML= $val.foul_home;
        document.getElementById("foul_away").innerHTML= $val.foul_away;
        document.getElementById("away").innerHTML= $val.away;
        document.getElementById("name_away").innerHTML= 'Tim '+ $val.name_away;
        document.getElementById('menit').innerHTML = $val.menit;
        document.getElementById('detik').innerHTML = $val.detik;
        document.getElementById('timer').innerHTML = $val.menit + ":" + $val.detik;
            //time
            //console.log($val.status);
            if($val.status==1){
                startTimer();
                function startTimer() {
                //console.log($val.status);
                        var presentTime = document.getElementById('timer').innerHTML;
                        var timeArray = presentTime.split(/[:]+/);
                        var m = timeArray[0];
                        var s = checkSecond((timeArray[1] - 1));
                        if(s==59){m=m-1}
                        if(m<0){
                            if($val.menit==0 && $val.detik==00){
                                var audio4 = document.getElementById("audio4");
                                audio4.play();
                                console.log('timer completed');
                            }
                            // console.log(stop);
                        }
                        else{
                            // document.getElementById('timer').innerHTML =
                            // m + ":" + s;
                            menit = m;
                            detik = s;
                            insert_menit_detik();
                            console.log(m);
                            console.log(s);
                            setTimeout(startTimer, 1000*1000);
                        }
                    }
                    function checkSecond(sec) {
                            if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
                            if (sec < 0) {sec = "59"};
                            return sec;
                    }
            }
        }
        
    } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
    }
function insert_menit_detik(){
              // console.log(menit);
              // console.log(detik);
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
        var url = "{{ url('/update-menit-detik') }}";
        $.ajax({
           url:url,
           method:'POST',
           data:{
              name_menit:menit, 
              name_detik:detik, 
           },
           success:function(response){
              if(response.success){
                  // console.log(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
}
</script>
  </body>
</html>