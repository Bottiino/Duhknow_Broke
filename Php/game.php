<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <style type="text/css">            
            html, body{
                margin: 0;
                padding: 0;
                width: 100%;
                overflow: hidden;
            }
            div#timerBackground{
                position: absolute;
                background: #111;
                overflow: hidden;
                width: 100%;
                height: 50px;
            }
            div#timer{
                position: absolute;
                background: #1B1;
                height: 50px;
                animation: loading 20s linear;
                animation-fill-mode: forwards;  
            }
            @keyframes loading {
                0% {                    
                    width: 0%;
                }
                100%{
                    width: 100%;
                }
            }
            div#board{
                background:#CCC;
                border:#999 0px solid;
                width:100%;
                height: 550px;
                margin-top: 50px;
            }
            div#board > div{
                    background: #444;
                    border:#000 1px solid;
                    width:32.9%;
                    height:33.2%;
                    float:left;
                    font-size:64px;
                    cursor:pointer;
                    text-align:center;
            }
            div#round{
                background: #919;
                width: 100%;
                height: 100px;
                padding-top: 12px;
                text-align:center;
                font-size: 2em;
            }
        </style>
        <script>     
            var memory_values = [];
            var memory_tile_ids = [];
            var tiles_selected = 0;
            var round = 0;
            
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
                        output += '<div id="tile_'+i+'" onclick="selectedTile(this,\''+topic_words[i]+'\',\''+centreCard+'\')">' + topic_words[i] + '</div>';
                    }
                    else
                    {
                        output += '<div id="tile_'+i+'">' + centreCard + '</div>';
                        i--;
                    }
                    j++;
                }
                document.getElementById('board').innerHTML = output;
            }
                        
            function selectedTile(tile,val,centreCard)
            {                
                if(val === centreCard)
                {
                    tile.style.background = '#1F1';
                    round++;
                    setTimeout(newBoard, 250);
                    document.getElementById('round').innerHTML = "Round " + round;
                }
                else
                {
                    tile.style.background = '#F11';
                    setTimeout(newBoard,250);
                }
            }            
        </script>
    </head>
    <body>
        <div id="timerBackground"></div>
        <div id="timer"></div>
        <div id="board"></div>
        <div id="round">Round 0</div>
        <script>newBoard();</script>
    </body>
</html>