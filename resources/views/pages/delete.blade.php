<html>
  <body>
    <?php
      if(isset($mid)){ ?>
        <form action="{{ url('deletemess/'.$pid.'/'.$mid) }}" method="POST">
          @csrf
          @method('delete')
        </form>
    <?php
      }
      else{ ?>
        <form action="{{ url('delete/'.$pid) }}" method="POST">
          @csrf
          @method('delete')
        </form>
    <?php
      }
    ?>
    <script>
      document.forms[0].submit();
    </script>
  </body>
</html>