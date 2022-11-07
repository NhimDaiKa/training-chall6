<?php 

if(!isset($mid)){
    $mid = 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ url('chat.css') }}">
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">
</head>

<body>
    <section class="msger">
    <header class="msger-header">
        <div class="msger-header-title">
            <a href="{{ url('userlist') }}" style="color:black"><i class="fa fa-arrow-left"></i></a>
            <i class="fas fa-comment-alt"></i>Chatbox
        </div>
        <div class="msger-header-options">
        <span><i class="fas fa-cog"></i></span>
        </div>
    </header>

    <main class="msger-chat">
        <?php
            foreach ($mess as $m) {
                if($m->sid==$pid && $m->rid==session()->get('pid')){
                    echo '<div class="msg left-msg">';
                    echo '<div class="msg-img" style="background-image: url('.asset('storage/'.$m->sava).')"></div>';
                    echo '<div class="msg-bubble">';
                    echo '<div class="msg-info">';
                    echo '<div class="msg-info-name">'.$m->send.'</div>';
                    echo '</div>';
                    echo '<div class="msg-text">'.$m->mess.'</div>';
                    echo '</div></div>';
                }
                if($m->sid==session()->get('pid') && $m->rid==$pid){ 
                    if($mid==$m->mid){
                        echo '<div class="msg right-msg">';
                        echo '<div class="msg-img" style="background-image: url('.asset('storage/'.$m->sava).')"></div>';
                        echo '<div class="msg-info">';
                        echo '<div class="msg-info-time"><a href="'.url('deleteid/'.$pid.'/'.$m->mid).'">Dalete </a></div>';
                        echo '<form class="msger-inputarea" method="POST" action="'.url('editmess/'.$pid.'/'.$m->mid).'">'; ?>
                            @csrf
                            {{ method_field('patch') }}
                    <?php
                        echo '<input type="text" class="msger-input" placeholder="Enter your message..." name="mess" value="'.$m->mess.'" required>
                            <button class="msger-send-btn">Change</button>
                        </form></div></div>';
                    }
                    else{ 
                        echo '<div class="msg right-msg">';
                        echo '<div class="msg-img" style="background-image: url('.asset('storage/'.$m->sava).')"></div>';
                        echo '<div class="msg-bubble">';
                        echo '<div class="msg-info">';
                        echo '<div class="msg-info-name">'.$m->send.'</div>';
                        echo '<div class="msg-info-time"><a href="'.url('editchat/'.$pid.'/'.$m->mid).'">Edit</a></div>';
                        echo '</div>';
                        echo '<div class="msg-text">'.$m->mess.'</div>';
                        echo '</div></div>';
                    }
                }
            }
        ?>
    </main>
    <form class="msger-inputarea" method="POST" action="{{ url('sendmess/'.$pid) }}">
        @csrf
        <input type="text" class="msger-input" placeholder="Enter your message..." name="mess" required>
        <button class="msger-send-btn">Send</button>
    </form>
    </section>
    
</body>

</html>

