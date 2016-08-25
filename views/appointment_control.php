<div>
<br>
<a href="javascript;" class="css_button join-appointment" style="display: none;"><span>Join</span></a>

<script type="text/javascript">
    $(document).ready( function() {
        $(".join-appointment").show();

        $(".join-appointment").click( function( e ){
            e.preventDefault();
            parent.left_nav.loadFrame( "vidyo", "vidyo", "vidyo/index.php?action=vidyo" );
        });
    });
</script>
</div>
