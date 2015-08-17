{$View->start('css')}
{literal}
    <style type="text/css">        
    </style>
{/literal}
{$View->end()}

{* このページ特有のJavaScript *}
{$View->start('script')}

<script language="javascript" type="text/javascript" src="/common_pc/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">

    $(function () {
        reloadCaptcha();
    });

    function reloadCaptcha() {
        document.images.captcha.src = "{$View->Html->url('/captcha?')}" + Math.round(Math.random(0) * 1000) + 1;
        $('#captcha_text').val('');
  }
   
</script>

{$View->end()}
{* </head> *}

<body>
  <form action="/" method="post">
      <div>
          <img id="captcha" src="{$View->Html->url('/captcha')}" alt="" width="170" height="50"/>
          <a href="javascript:void(0);" onclick="reloadCaptcha();" >
              <img class="captcha_btn" src="/common_pc/img/btn-captcha.png" alt="退会する" class="reload"></a>
      </div>
      <div>
          <div><input type="text" tabindex="5" id="captcha_text" name="captcha_text" class="txtmode2 txtmode_add2"/> </div>
          <label class="error" id="lbl_captcha_text">{if isset($data.errorCaptcha)}{$data.errorCaptcha}{/if}</label>
      </div>
       <input type="submit" tabindex="6" value="submit" />
  </form>
</body>
