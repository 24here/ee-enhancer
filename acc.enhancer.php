<?php


class Enhancer_acc {

    var $name       = 'Enhancer';
    var $id         = 'Enhancer';
    var $version    = '1.0';
    var $description= 'Enhancer add cool User Experience in CP';
    var $sections   = array();

    /**
     * Constructor
     */
    function __construct()
    {
        $this->EE =& get_instance();
    }

    /**
     * Set Sections
     *
     * Set content for the accessory
     *
     * @access  public
     * @return  void
     */
    function set_sections()
    {
       // $this->EE->cp->load_package_js('hosei');
	   
	    // get global GET param vars
        $C = $this->EE->input->get('C');
        $M = $this->EE->input->get('M');
        $module = $this->EE->input->get('module');
		
		// add global Hosei css fixes
        $this->EE->cp->add_to_head('<script type="text/javascript" charset="utf-8">$(document).ready(function() {$(\'.hosei\').parent().remove();});</script><style type="text/css" media="screen">.mainTable tr:hover > td{background-color: #e3e7e9 !important;}</style>');
			
        if($module == 'comment') {
        	$this->EE->cp->add_to_head('<style type="text/css" media="screen">.tableSubmit{ clear:both; }</style>');
			$this->EE->cp->load_package_js('comments');
        }
		
//		if($C == 'homepage') $this->EE->cp->add_to_head('<script type="text/javascript" charset="utf-8">
//				$(document).ready(function() {
//						$(\'.create .homeBlocks\').append(\'<li class="item"><a href="#'.BASE.AMP.'C=design"></a></li>\');
//			});</script>');
			
			
		if($C == 'content_publish' && $M == 'entry_form') {
			
			$this->EE->cp->load_package_js('entry_form');
			
			$entry_id = $this->EE->input->get('entry_id');
			
			$JS = '<script type="text/javascript" charset="utf-8">function hosei_add_button() {';
			if($entry_id > 0){
				$JS.='$(\'.contents .heading h2\').append(\'<ul id="action_nav"> \
							<li class="button"> \
							<form method="POST" action="'.BASE.AMP.'&C=content_edit&C=content_edit&M=multi_edit_form"> \
									<input type="hidden" name="toggle[]" value="'.$entry_id.'"> \
									<input type="hidden" name="action" value="delete"> \
									<input type="hidden" name="XID" value="\'+EE.XID+\'"> \
									<input class="submit submit_alt" type="submit" value="'.$this->EE->lang->line('delete').'"> \
								</form> \
							</li> \
						</ul>\');';
				
			}
			$JS.='};</script>';
            $this->EE->cp->add_to_head($JS);
		}
		 
        if($C == 'addons_modules' && $M == false){
            $this->EE->cp->add_to_head(str_replace("\n",'','<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
						$(\'.contents .heading h2\').append(\'<ul id="action_nav">
							<li class="button"><a href="'.BASE.AMP.'C=addons_extensions'.'" class="submit">'.$this->EE->lang->line('extensions').'</a></li>
							<li class="button"><a href="'.BASE.AMP.'C=addons_plugins'.'" class="submit">'.$this->EE->lang->line('plugins').'</a></li><li class="button"><a href="'.BASE.AMP.'C=addons_accessories'.'" class="submit">'.$this->EE->lang->line('accessories').'</a></li>
							</ul>\');
					    var modules_button = $(\'.rightNav .button\').html();
					    $(\'.contents .heading h2 #action_nav\').append(\'<li class="button">\'+modules_button+\'</li>\');
						$(\'.rightNav .button\').remove();
			});</script>'));
		}
		
		if($C == 'addons_extensions' && $M == false){
            $this->EE->cp->add_to_head('<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
						$(\'.contents .heading h2\').append(\'<ul id="action_nav"><li class="button"><a href="'.BASE.AMP.'C=addons_modules'.'" class="submit">'.$this->EE->lang->line('modules').'</a></li><li class="button"><a href="'.BASE.AMP.'C=addons_plugins'.'" class="submit">'.$this->EE->lang->line('plugins').'</a></li><li class="button"><a href="'.BASE.AMP.'C=addons_accessories'.'" class="submit">'.$this->EE->lang->line('accessories').'</a></li></ul>\');
			});</script>');
			
		}
		
		if($C == 'addons_plugins' && $M == false){
					$this->EE->cp->add_to_head('<script type="text/javascript" charset="utf-8">
						$(document).ready(function() {
								$(\'.contents .heading h2\').append(\'<ul id="action_nav"><li class="button"><a href="'.BASE.AMP.'C=addons_modules'.'" class="submit">'.$this->EE->lang->line('modules').'</a></li><li class="button"><a href="'.BASE.AMP.'C=addons_extensions'.'" class="submit">'.$this->EE->lang->line('extensions').'</a></li><li class="button"><a href="'.BASE.AMP.'C=addons_plugins'.'" class="submit">'.$this->EE->lang->line('plugins').'</a></li></ul>\');
					});</script>');
		
		}
		
		if($C == 'addons_accessories' && $M == false){
					$this->EE->cp->add_to_head('<script type="text/javascript" charset="utf-8">
						$(document).ready(function() {
								$(\'.contents .heading h2\').append(\'<ul id="action_nav"><li class="button"><a href="'.BASE.AMP.'C=addons_modules'.'" class="submit">'.$this->EE->lang->line('modules').'</a></li><li class="button"><a href="'.BASE.AMP.'C=addons_extensions'.'" class="submit">'.$this->EE->lang->line('extensions').'</a></li><li class="button"><a href="'.BASE.AMP.'C=addons_plugins'.'" class="submit">'.$this->EE->lang->line('plugins').'</a></li></ul>\');
					});</script>');
		
		}
				
		if($C == 'design' && $M == 'edit_template'){
			$template_id = $this->EE->input->get('id');
            $this->EE->cp->add_to_head('<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
						$(\'.contents .heading h2\').append(\'<ul id="action_nav"><li class="button"><a href="'.BASE.AMP.'C=design&M=template_delete_confirm&template_id='.$template_id.'" class="submit">'.$this->EE->lang->line('delete').'</a></li></ul>\');
						
				$(\'#templateViewLink a.submit\').attr("target","_blank");
				$("title").prepend($("#templateId_'.$template_id.'").text()+" | ");
			});</script>');
		}
		
		if($C == 'design' && $M == 'global_template_preferences') {
            $this->EE->cp->add_to_head('<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
						$(\'.mainTable.padTable tr:last >td:last\').append(\'<div class="subtext">Expample <a href="#" title="Click for paste" class="hosei_paste_tpl">'.APPPATH.'templates/</a></div>\');
						$(".hosei_paste_tpl").click(function(){
							$(\'.mainTable.padTable tr:last >td:last input\').val(\''.APPPATH.'templates/\');
						});
			});</script>');
	
		}

    }

    function update()
    {
        return TRUE;
    }
}
// END CLASS

