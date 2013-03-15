<?php

class cfs_auto_complete extends cfs_field
{
    function __construct($parent)
    {
        $this->name = 'auto_complete';
        $this->label = 'Auto Complete';
        $this->parent = $parent;
    }

    function html($field)
    {
    ?>
        <script>
        (function($) {
            $(function() {
                $('#cfs_auto_complete_<?php echo $field->id;?>').autocomplete(
                {
                    source: ajaxurl+'?action=cfs_auto_complete_<?php echo $field->id?>'
                }
            );
            });
        })(jQuery);
        </script>
        <input type="text" placeholder="Auto complete" id="cfs_auto_complete_<?php echo $field->id;?>" name="<?php echo $field->input_name; ?>" class="<?php echo $field->input_class; ?>" value="<?php echo $field->value; ?>"/>
    <?php    
    }

    function input_head()
    {
    ?>
         <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
         <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
          
    <?php
    }
    
    function options_html($key, $field) {
?>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label" colspan="2">
<?php if(isset($field->id)) { ?>
<pre>
add_action('wp_ajax_cfs_auto_complete_<?php echo $field->id;?>', 'cfs_auto_complete_<?php echo $field->id;?>');

function cfs_auto_complete_<?php echo $field->id;?>() {
    global $wpdb; // this is how you get access to the database
    $term = $_GET['term'];
    // Do somethig with $term

    // You must output a JSON array
    //Exemple :  echo json_encode(array('result 1','result 2'));
    die(); // this is required to return a proper result
}
</pre>
<?php } else { echo 'Save the fields group to get the PHP code template.'; } ?></td>
        </tr>
        <?php
    }   
}