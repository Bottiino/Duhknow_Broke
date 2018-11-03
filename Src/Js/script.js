$(function () {
   
    var memory_values = [];
    var memory_tile_ids = [];
    var tiles_selected = 0;
    var round = 0;

    setTimeout(newBoard, 4000);

    Array.prototype.shuffle = function(){
        var i = this.length, j, temp;
        while(--i > 0){
            j = Math.floor(Math.random() * (i+1));
            temp = this[j];
            this[j] = this[i];
            this[i] = temp;
        }
    }

    function newBoard(){
        var topic_words = ['A','B','C','D','E','F','G','H'];

        var rand = Math.floor((Math.random() * 8));
        var centreCard = topic_words[rand];

        var output = '';
        var j = 0;

        topic_words.shuffle();

        for(var i = 0; i < 8; i++){
            if(j != 4)
            {
                output += '<div id="tile_'+i+'" class="tile out_tile">' + topic_words[i] + '</div>';
            }
            else
            {
                output += '<div id="centre_tile" class="tile col-lg-4 col-md-4 col-sm-4 col-xs-4">' + centreCard + '</div>';
                i--;
            }
            j++;
        }
        document.getElementById('board').innerHTML = output;
    }
    
    var timeLeft = "Ready";
    var elem = document.getElementById('countDown');
    var timerId = setInterval(countdown, 1000);
    
    function countdown(){
        elem.innerHTML = timeLeft;
        
        if(timeLeft === "Done"){
            clearTimeout(timerId);
            elem.style.display = "none";
        }
        else if(timeLeft === "Go!"){            
            timeLeft = "Done";
        }
        else if(timeLeft === "Set"){
            timeLeft = "Go!";
        }
        else{            
            timeLeft = "Set";
        }
    }    

    function selectedTile(tile,centreCard)
    {        
        var val = tile.text();
        if(val === centreCard)
        {
            tile.css('background', '#1F1');
            round++;
            setTimeout(newBoard, 250);
            $('div#round').html("Round " + round);
        }
        else
        {
            tile.css('background', '#F11');
            setTimeout(newBoard,250);
        }
    }
    
    
    setTimeout(timesUp, 34000);
    function timesUp(){
        $('div#timesUp').html("Times Up");
    }
    
    $(document).off('click', 'div.out_tile').on('click', 'div.out_tile', function () {
        var centreVal = $('div#centre_tile').text();
        selectedTile($(this), centreVal);
    });
});