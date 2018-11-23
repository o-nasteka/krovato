<style>
    /* The Modal (background) */
    #modal<?php echo $id;?> {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 9999; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    #modal<?php echo $id;?> .modal-content {
        display: none; /* Hidden by default */
        background-color: #fefefe;
        margin-top:20px;
        padding: 20px;
        border: 1px solid #888;
        margin-left:auto;
        margin-right:auto;
        width: <?php echo $max_width;?>px;
    }
    
    #modal<?php echo $id;?> .modal-content {
        <?php echo $custom_css;?>
    }
    /* The Close Button */
    #modal<?php echo $id;?> .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    #modal<?php echo $id;?> .close:hover,
    #modal<?php echo $id;?> .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<div id="modal<?php echo $id;?>" >

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <?php echo $content1;?>
        <?php // var_dump($data);?>
    </div>

</div>
<script>
    $(document).ready(function () {
        
        $("#modal<?php echo $id;?> .modal-content").click(function(e){
           event.stopPropagation();
        });
    
        $('#modal<?php echo $id;?> .close,#modal<?php echo $id;?>').click(function(e){
            $("#modal<?php echo $id;?>").hide();
            $("#modal<?php echo $id;?> .modal-content").hide();
        });
        <?php echo $event;?>
        
    });
        
        
        function show_modal<?php echo $id;?>()
        {
            var selectedEffect1 = '<?php echo $effect;?>';
            var selectedEffect2 = '<?php echo $bg_effect;?>';
            
            var options = {};
            
            //scale,transfer,size exclude
            
            $("#modal<?php echo $id;?>").show(selectedEffect2, options, <?php echo $bg_effect_duration;?>, callback);
            setTimeout(function(){
                $("#modal<?php echo $id;?> .modal-content").show( selectedEffect1, options, <?php echo $effect_duration;?>, callback )
            },<?php echo $bg_effect_duration;?>);
        }
        
        function callback() {
        }
</script>

