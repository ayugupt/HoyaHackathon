var HttpClient = function() {
    this.get = function(aUrl, header, aCallback) {
        var anHttpRequest = new XMLHttpRequest();
        anHttpRequest.onreadystatechange = function() { 
            if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
                aCallback(anHttpRequest.responseText);
        }

        anHttpRequest.open( "GET", aUrl+"/?mssg="+header, true );         
        anHttpRequest.send( null );
    }
}

$(document).ready(function(){
   $('#chatForm').submit(function(e){
    e.preventDefault();
    var userMessage = String(document.getElementById("mssgToChatbot").value);
    var chatList = document.getElementById("chatList");
    var para = document.createElement("li");
    var node = document.createTextNode(userMessage);
    para.appendChild(node);
    chatList.appendChild(para);
    $.ajax({
        type:"GET",
        url:"/data/handleMessage.php/?mssg="+userMessage,
        success: function(response){
            var chatList = document.getElementById("chatList");
            var para2 = document.createElement("li");
            var node2 = document.createTextNode(response);
            para2.appendChild(node2);
            chatList.appendChild(para2);
        }
    })
   });
});

// document.getElementById("sendToChatbot").addEventListener("click", function(){
//     console.log("submitted");
//     var userMessage = String(document.getElementById("mssgToChatbot").value);
//     var chatList = document.getElementById("chatList");
//     var para = document.createElement("li");
//     var node = document.createTextNode(userMessage);
//     para.appendChild(node);
//     chatList.appendChild(para);
// //    var client = new HttpClient();
// //    client.get('handleMessage.php', userMessage, function(response){
// //        var para2 = document.createElement("li");
// //        var node2 = document.createTextNode(response);
// //        para2.appendChild(node2);
// //        chatList.appendChild(para2);
// //    });
// });


