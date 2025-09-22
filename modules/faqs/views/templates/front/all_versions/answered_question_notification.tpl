<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');

    h1 {
        font-size: 24px;
    }

    p {
        font-size: 16px;
    }

    a {
        text-decoration: none;
        outline: none;
    }

    button:hover, a:hover {
        opacity: 0.8;
    }
</style>

<div style="width:100%;">
    <div id="templateMailTableWrapper" style="
                                            width: 633px;
                                            background-color: #fff;
                                            border: 1px solid #dadada;
                                            min-height: 520px;
                                            margin: 0 auto;
                                            -moz-box-shadow: 0 0px 15px #898A8E;
                                            -webkit-box-shadow: 0 0px 15px #898A8E;
                                            box-shadow: 0 0px 15px #898A8E;
                                        ">

        <div id="templateMailTableLogo" style="
                                                height: auto;
                                                text-align: center;
                                                padding: 20px;
                                          ">
            <a href="{$baseUrl|escape:'htmlall':'UTF-8'}" style="
                                                                min-height: 100px;
                                                                width: 100%
                                                            ">
                <img src="{literal}{shop_logo}{/literal}">
            </a>
        </div>
        <div class="container" style="height: auto;
                                      background-color: #fff;
                                      padding: 5px 50px 50px 50px;
                                      word-break: break-word;
                                      line-height: 1.5;
                                      font-family: 'Roboto', sans-serif;">
            <div class="content-wrapper">
                <h1> {l s='We want to notify you, that question you recently posted in ' mod='faqs'}, {$customer_name|escape:'htmlall':'UTF-8'}!</h1>
                <hr/>
                <div>
                    <p>
                        {l s='We want to notify you, that question you recently posted in ' mod='faqs'}<b><a href="{$link_to_question_category_page|escape:'htmlall':'UTF-8'}">{$faq_category_name|escape:'htmlall':'UTF-8'}</a></b>
                        {l s=' FAQ category of our store was answered by the administrator. Thank you for your appeal!' mod='faqs'}
                    </p>
                </div>
                <div class="button-container" style="margin-top: 30px;
                                                    text-align: center;
                                                   ">
                    <a href="{$link_to_question_page|escape:'htmlall':'UTF-8'}">
                        <button style="width: 170px;
                                      height: 35px;
                                      background-color: #4e85b7;
                                      color: #fff;
                                      border: none;
                                      font-family: 'Roboto', sans-serif;
                                      cursor: pointer;
                                      outline: none;
                                      ">
                            {l s='GO TO QUESTION PAGE' mod='faqs'}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>