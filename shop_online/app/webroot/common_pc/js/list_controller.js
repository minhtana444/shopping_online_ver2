
var $objListController = {
	'$obj' : {}, 
	'$url' : '', 
	'$data' : {}, 
	'fInit' : function(){
		$objListController.$obj.$condition_area = $('#condition');
		$objListController.$obj.$condition_checkbox = $objListController.$obj.$condition_area.find('input[type=checkbox]');		

		$objListController.$obj.$result_list_area = $('#result_list');

		//リスナー設定
		$objListController.fSetListener();
	},
	'fSetListener' : function(){
		$objListController.$obj.$condition_checkbox.on('click', function($event){
			return $objListController.fGetList();    
		});
	},
	'fGetList' : function(){
		//POST用オブジェクトを初期化
		$objListController.$data = {};

		$objListController.$temp_obj = $objListController.$obj.$condition_checkbox.filter(':checked');
		for(var i = 0, n = $objListController.$temp_obj.length; i < n; i++){
			//name属性の[]の有無で分岐
      $objListController.$temp_obj_i = $objListController.$temp_obj.eq(i);
			$objListController.$temp_obj_i_name = $objListController.$temp_obj_i.attr('name');
      console.log($objListController.$temp_obj_i_name);
      console.log($objListController.$temp_obj_i.val());
			$objListController.$data[$objListController.$temp_obj_i_name] = $objListController.$temp_obj_i.val();
		}
	
		//物件一覧取得
		$.ajax({
			url: $objListController.$url,
			type: 'POST',
			data: $objListController.$data,
			beforeSend: function(){        
				$objLoader.fOpen();     
			},
			complete: function(){
        $objLoader.fClose();
			
			},
			success: function($response){
        var url = window.location.href;
//        if(url.indexOf('?page')>-1){
//          if(!getIEVersion()){
//            history.replaceState({}, "", $objListController.$url.replace('/chintai/ajax/','/chintai/')); 
//          }else{
//          window.location.href=$objListController.$url.replace('/chintai/ajax/','/chintai/');
//          }
//        }
				$objListController.$obj.$result_list_area.html($response);
//        window.history.replaceState( {} , '', '/huhu' );
                                
			}
		});
	}
};
//function getIEVersion()
//{
//  var rv = -1;
//  if (navigator.appName == 'Microsoft Internet Explorer')
//  {
//    var ua = navigator.userAgent;
//    var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
//    if (re.exec(ua) != null)
//      rv = parseFloat(RegExp.$1);
//  }
//  else if (navigator.appName == 'Netscape')
//  {
//    var ua = navigator.userAgent;
//    var re = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
//    if (re.exec(ua) != null)
//      rv = parseFloat(RegExp.$1);
//  }
//  return (rv!=-1&&rv <=9);
//}