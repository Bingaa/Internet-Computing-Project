<!DOCTYPE html>

<head> 
    <meta charset='utf-8'>
    <meta charset="iso-8859-1">
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/messages.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../scripts/messages.js"></script>
</head>

<body>
  <?php 
  include '../include/config.php';
  include '../include/functions.php';
  ?>

<div class="topnav">
    <img src="../images/LogoHorizontal.PNG" style="float:left; width:150px; height:60px; ">
    <a href="../logOut.php"><i class="fas fa-sign-out-alt" title="Sign Out"></i></a>
    <a href="profile.php"><i class="fa fa-fw fa-user" title="Profile"></i></a>
    <a href="search.php"><i class="fa fa-fw fa-search" title="Search for Contacts"></i></a> 
    <a class="active" href="messages.php"><i class="fas fa-comment" title="Messages"></i></a> 
</div>
    <div class="white-card-wide" style="margin-top: 50px;">

        <div>
                <div class="chat-section-header">
                        <h3>Messenger</h3> <i id="newMessage" class="fas fa-edit" title="New Message"></i>
                        <div id="myModalMessage" class="modal-message">
                          <div class="modal-content-message">
                              
                              <input type="text" id="searchContacts" placeholder="Search Contacts">
                              <ul id="to"> </ul>
                              <p> </p>
                              <div id="contactList"> 

                              </div>

                              <button id="createMessageButton">Create Message</button>
                          </div>
                          
                        </div>
                      </div>
                      
                      <div class="message-section-header">
               
                      </div>
            
                    <div>

        </div>
        
            
        </div class="messages-container">

          <div class="chat-section">

              <table id="messages-sidebar">
              <?php include "../getMessageGroups.php"?>
              </table>


          </div>
              
          <div class="message-section" id="messageSection">
                           
        </div>

        <div class="input-box">
            <div id="myModal" class="modal-emoji">
              <div id="emojiContent" class="modal-content-emoji">
                  <span>😀</span>
                  <span>😃</span>
                  <span>😄</span>
                  <span>😁</span>
                  <span>😆</span>
                  <span>😅</span>
                  <span>🤣</span>
                  <span>😊</span>
                  <span>😇</span>
                  <span>🙂</span>
                  <span>🙃</span>
                  <span>😉</span>
                  <span>😌</span>
                  <span>😍</span>
                  <span>😘</span>
                  <span>😗</span>
                  <span>😙</span>
                  <span>😚</span>
                  <span>😋</span>
                  <span>😛</span>
                  <span>😝</span>
                  <span>😜</span>
                  <span>🤨</span>
                  <span>🤪</span>
                  <span>🧐</span>
                  <span>🤓</span>
                  <span>😎</span>
                  <span>🤩</span>
                  <span>😏</span>
                  <span>😒</span>
                  <span>😞</span>
                  <span>😔</span>
                  <span>😟</span>
                  <span>😕</span>
                  <span>🙁</span>
                  <span>😣</span>
                  <span>😖</span>
                  <span>😫</span>
                  <span>😢</span>
                  <span>😭</span>
                  <span>😤</span>
                  <span>😠</span>
                  <span>😡</span>
                  <span>🤬</span>
                  <span>🤯</span>
                  <span>😳</span>
                  <span>😱</span>
                  <span>😨</span>
                  <span>😰</span>
                  <span>😥</span>
                  <span>😓</span>
                  <span>🤔</span>
                  <span>🤗</span>
                  <span>🤭</span>
                  <span>🤫</span>
                  <span>🤥</span>
                  <span>😶</span>
                  <span>😐</span>
                  <span>😑</span>
                  <span>😬</span>
                  <span>🙄</span>
                  <span>😯</span>
                  <span>😦</span>
                  <span>😧</span>
                  <span>😮</span>
                  <span>😲</span>
                  <span>😴</span>
                  <span>🤤</span>
                  <span>😪</span>
                  <span>😵</span>
                  <span>🤐</span>
                  <span>🤢</span>
                  <span>🤮</span>
                  <span>🤧</span>
                  <span>🍑</span>
                  <span>🍆</span>
                  <span>❤️</span>
                  <span>🧡</span>
                  <span>💛</span>
                  <span>💚</span>
                  <span>💙</span>
                  <span>💜</span>
                  <span>🖤</span>
                  <span>💔</span>
                </div>
              </div>

              <div id="gifModal" class="modal-gif">
                <div id="gifContent" class="modal-content-gif">
                  <input id="gifInput" type=”text” placeholder="Search for GIFs!">
                  <div id="listGifs">

                  </div>
                </div>
              </div>
                <input id="chatInput"type="text" placeholder="Type a message...">
                <i id="emojiButton" class="far fa-smile" title="Send Emoji"></i>
                <i id="sendImageButton" name="sendImageButton" class="far fa-image" title="Send Image"></i>
                <input id="imageFile" name="sendImage" type="file" accept="image/*" hidden/>
                <i id="sendGIFButton" class="fas fa-film" title="Send GIF"></i>
                <i class="fas fa-paperclip" title="Send File"></i>
                <i class="fas fa-map-marker-alt" title="Send Location"></i>
        </div> 

        <?php 

        $targetdir = "../images/messages/";
            if(isset($_FILES["sendImageButton"])){
              $targetfile = $targetdir.$_FILES['sendImageButton']['name'];
              $ext = pathinfo($_FILES['sendImageButton']['name'], PATHINFO_EXTENSION);
              if (move_uploaded_file($_FILES['sendImageButton']['tmp_name'], $targetfile)) {
                rename($targetdir.$_FILES['sendImageButton']['name'], $targetdir. $_SESSION["id"]. "." .$ext);

              }
           }

        ?>

        </div>

    </div>

</div>


</body>
