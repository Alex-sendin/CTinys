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
                <h1>{l s='Hello, Admin!' mod='faqs'}</h1>
                <hr/>
                <div>
                    <p>
                        {l s='You are receiving this notification because a customer with the name - ' mod='faqs'}<b>{$customer_name|escape:'htmlall':'UTF-8'}</b>{l s=', and e-mail address - ' mod='faqs'}<b>{$customer_email|escape:'htmlall':'UTF-8'}</b>{l s=' asked you following question:' mod='faqs'}
                    </p>

                    <blockquote style="background-color: #f6f4f4; padding: 10px; word-break: break-all">
                        <p><i>"{$customer_question|escape:'htmlall':'UTF-8'}"</i></p>
                    </blockquote>

                    <p>
                        {if $faq_category_name && $associated_product_name}
                            {l s='The question is linked by the customer to ' mod='faqs'}<b>{$faq_category_name|escape:'htmlall':'UTF-8'}</b>{l s=' questions category and associated with ' mod='faqs'}<b><a href="{$associated_product_link|escape:'htmlall':'UTF-8'}">{$associated_product_name|escape:'htmlall':'UTF-8'}</a></b>{l s=' product.' mod='faqs'}
                        {elseif $faq_category_name && !$associated_product_name}
                            {l s='The question is linked by the customer to ' mod='faqs'}<b>{$faq_category_name|escape:'htmlall':'UTF-8'}</b>{l s=' questions category.' mod='faqs'}
                        {elseif !$faq_category_name && $associated_product_name}
                            {l s='The question is associated with ' mod='faqs'}<b><a href="{$associated_product_link|escape:'htmlall':'UTF-8'}">{$associated_product_name|escape:'htmlall':'UTF-8'}</a></b>{l s=' product.' mod='faqs'}
                        {/if}
                    </p>
                </div>
                <div class="button-container" style="margin-top: 30px;
                                                    text-align: center;
                                                   ">
                    <a href="{$faq_edit_page_link|escape:'htmlall':'UTF-8'}">
                        <button style="width: 170px;
                                      height: 35px;
                                      background-color: #4e85b7;
                                      color: #fff;
                                      border: none;
                                      font-family: 'Roboto', sans-serif;
                                      cursor: pointer;
                                      outline: none;
                                      ">
                            {l s='ANSWER QUESTION' mod='faqs'}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>