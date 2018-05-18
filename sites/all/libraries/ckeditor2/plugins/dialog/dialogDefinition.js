/*
 Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
CKEDITOR.on('dialogDefinition', function( ev )
{
   var dialogName = ev.data.name;  
   var dialogDefinition = ev.data.definition;
   //alert(dialogDefinition);
   if ( dialogName == 'link' || dialogName == 'table' || dialogName == 'tableProperties' || dialogName == 'image')
    {     
      dialogDefinition.removeContents( 'advanced' );      
    }
   switch (dialogName) {   
   case 'link': //image Properties dialog 
   dialogDefinition.removeContents('target');          
   dialogDefinition.removeContents('advanced');
   break;
   case 'image':
    dialogDefinition.removeContents('advanced'); 
   break;
   }
});