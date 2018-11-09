$(function () {
   
    var memory_values = [];
    var memory_tile_ids = [];
    var tiles_selected = 0;
    var round = 0;

    setTimeout(newBoard, 3000);

    Array.prototype.shuffle = function(){
        var i = this.length, j, temp;
        while(--i > 0){
            j = Math.floor(Math.random() * (i+1));
            temp = this[j];
            this[j] = this[i];
            this[i] = temp;
        }
    }
    
    function getEightWords(){
        jQuery.ajax({
            type: "POST",
            url: '../Database/functions.php',
            dataType: 'json',
            data: {functionname: 'getEightWordsFrench', argument: 1},

            success: function (data) {
                return data;
            }
        });
    }
    //Function to get name 
//    function getCategorys(){
//        jQuery.ajax({
//            type: "POST",
//            url: '../Database/functions.php',
//            dataType: 'json',
//            data: {functionname: 'getCategory', argument: 1},
//
//            success: function (data) {
//                return data;
//            }
//        });
//    }
//    
    //Function call for getting the id, english, french, irish, german, french and image for all words for use in dictionary
//    function getWords(){
//        jQuery.ajax({
//            type: "POST",
//            url: '../Database/functions.php',
//            dataType: 'json',
//            data: {functionname: 'getWords', argument: 1},
//            success: function (data) {
//                return data;
//            }
//       });
//    }

    function newBoard(){
        
        var topic_words = getEightWords();
        var b;
        foreach(b in topic_words)
        {
            
        }

        var rand = Math.floor((Math.random() * 8));
        var centreCard = topic_words[rand];

        var output = '';
        var j = 0;

        topic_words.shuffle();

        for(var i = 0; i < 8; i++){
            if(j != 4)
            {
                output += '<div class="tile out_tile"><div class="tileText">' + topic_words[i] + '</div></div>';
            }
            else
            {
                output += '<div id="centre_tile" class="tile"><div class="tileText">' + centreCard + '</div></div>';
                i--;
            }
            j++;
        }
        document.getElementById('board').innerHTML = output;
    }
    
    var timeLeft = "Ready";
    var body = document.getElementById('countdown');
    var text = document.getElementById('countdownText');
    countdown();
    var timerId = setInterval(countdown, 1000);
    
    function countdown(){
        text.innerHTML = timeLeft;
        
        if(timeLeft === "Done"){
            clearTimeout(timerId);
            body.style.background = "rgb(1,1,1,0)";
            body.style.display = "none";
        }
        else if(timeLeft === "Go!"){            
            timeLeft = "Done";
            body.style.background = "#5BB85D";
        }
        else if(timeLeft === "Set"){
            timeLeft = "Go!";
            body.style.background = "#EFAD4D";
        }
        else{            
            timeLeft = "Set";
            body.style.background = "#D9534E";
        }
    }    
    
    function show(id){
        document.getElementById(id).style.display = "block";
    }
    setTimeout(function(){show("finScreen");}, 34000);
    setTimeout(function(){show("timesUp");}, 34000);

    function selectedTile(tile,centreCard)
    {        
        var val = tile.text();  
        if(val === centreCard)
        {
            tile.css('background', '#1F1');
            round++;
            setTimeout(newBoard, 250);
            $('div#round').html("Round " + round);
            //call function here
        }
        else
        {
            tile.css('background', '#F11');
            setTimeout(newBoard,250);
            //call function here
        }
    }    
    
    //Create funtion here
    
    setTimeout(timesUp, 34000);
    function timesUp(){
        $('div#timesUp').html("Times Up");
    }
    
    $(document).off('click', 'div.out_tile').on('click', 'div.out_tile', function () {
        var centreVal = $('div#centre_tile').text();
        selectedTile($(this), centreVal);
    });
});