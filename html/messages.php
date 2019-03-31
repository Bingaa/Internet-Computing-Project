<!DOCTYPE html>

<head> 
    <meta charset='utf-8'>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/messages.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../scripts/messages.js"></script>
</head>

<body>
  <?php 
  session_start(); 
  echo $_SESSION["id"];?>

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

                              <h2>hello</h2>
                          </div>
                          
                        </div>
                      </div>
                      
                      <div class="message-section-header">
                            <h3>Alex Yang</h3>
                      </div>
            
                    <div>

        </div>
        
            
        </div class="messages-container">

          <div class="chat-section">
              <table>
                  <tr> 
                      <td> 
                        <img id="profile" src="../images/profiles/kyuYang69.jpg">
          
                        <h4>Alex Yang</h4>
                        <p class="timestamp">9:52PM</p>
                        <p>Wanna go Mcdonalds? </p>
   
                      </td>
                  </tr>
                  <tr> 
                        <td> 
                          <img id="profile" src="../images/profiles/fong69.jpg">
                          <h4>Andrew Fong</h4>
                          <p class="timestamp">9:52PM</p>
                          <p>fOOD!???? </p>
                        </td>
                    </tr>
                    <tr> 
                            <td> 
                              <img id="profile" src="../images/profiles/kyuYang69.jpg">
                              <h4>Alex Yang</h4>
                              <p class="timestamp">9:52PM</p>
                              <p>Wanna go Mcdonalds? </p>
                            </td>
                        </tr>
                        <tr> 
                              <td> 
                                <img id="profile" src="../images/profiles/fong69.jpg">
                                <h4>Andrew Fong</h4>
                                <p class="timestamp">9:52PM</p>
                                <p>fOOD!???? </p>
                              </td>
                          </tr>
                          <tr> 
                                <td> 
                                  <img id="profile" src="../images/profiles/kyuYang69.jpg">
                                  <h4>Alex Yang</h4>
                                  <p class="timestamp">9:52PM</p>
                                  <p>Wanna go Mcdonalds? </p>
                                </td>
                            </tr>
                            <tr> 
                                  <td> 
                                    <img id="profile" src="../images/profiles/fong69.jpg">
                                    <h4>Andrew Fong</h4>
                                    <p class="timestamp">9:52PM</p>
                                    <p>fOOD!???? </p>
                                  </td>
                              </tr>
                              <tr> 
                                    <td> 
                                      <img id="profile" src="../images/profiles/kyuYang69.jpg">
                                      <h4>Alex Yang</h4>
                                      <p class="timestamp">9:52PM</p>
                                      <p>Wanna go Mcdonalds? </p>
                                    </td>
                                </tr>
                                <tr> 
                                      <td> 
                                        <img id="profile" src="../images/profiles/fong69.jpg">
                                        <h4>Andrew Fong</h4>
                                        <p class="timestamp">9:52PM</p>
                                        <p>fOOD!???? </p>
                                      </td>
                                  </tr>
                                  <tr> 
                                        <td> 
                                          <img id="profile" src="../images/profiles/kyuYang69.jpg">
                                          <h4>Alex Yang</h4>
                                          <p class="timestamp">9:52PM</p>
                                          <p>Wanna go Mcdonalds? </p>
                                        </td>
                                    </tr>
                                    <tr> 
                                          <td> 
                                            <img id="profile" src="../images/profiles/fong69.jpg">
                                            <h4>Andrew Fong</h4>
                                            <p class="timestamp">9:52PM</p>
                                            <p>fOOD!???? </p>
                                          </td>
                                      </tr>

                                      <tr> 
                                            <td> 
                                              <img id="profile" src="../images/profiles/kyuYang69.jpg">
                                              <h4>Alex Yang</h4>
                                              <p class="timestamp">9:52PM</p>
                                              <p>Wanna go Mcdonalds? </p>
                                            </td>
                                        </tr>
                                        <tr> 
                                              <td> 
                                                <img id="profile" src="../images/profiles/fong69.jpg">
                                                <h4>Andrew Fong</h4>
                                                <p class="timestamp">9:52PM</p>
                                                <p>fOOD!???? </p>
                                              </td>
                                          </tr>

              </table>

          </div>
              
          <div class="message-section" id="messageSection">
            <div class="received">

                <p> <span>Hey do i look good here? </span></p>
                <img class="received" id="profile" src="../images/profiles/kyuYang69.jpg">

            </div>
      
              
      
                           
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
                </div>
              </div>
                <input id="chatInput"type="text" placeholder="Type a message...">
                <i id="emojiButton" class="far fa-smile" title="Send Emoji"></i>
                <i id="sendImageButton" class="far fa-image" title="Send Image"></i>
                <input id="imageFile" type="file" accept="image/*" hidden/>
                <i class="fas fa-camera" title="Take Picture"></i>
                <i class="fas fa-paperclip" title="Send File"></i>
                <i class="fas fa-map-marker-alt" title="Send Location"></i>
        </div> 

        </div>

    </div>

</div>


</body>