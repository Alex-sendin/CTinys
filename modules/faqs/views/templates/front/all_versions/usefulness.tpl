<hr>

<div data-id="{$usefulness['id_faq']|escape:'htmlall':'UTF-8'}" class="usefulness_row {$usefulness['page']|escape:'htmlall':'UTF-8'}">
    <div class="usefulness_left_column">
        <div class="usefulness_icon">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="18" cy="18" r="17.5" fill="white" stroke="#2FB5D2"/>
                <path d="M27.9375 16H24.5625C24.2519 16 24 16.2519 24 16.5625V16.9176C23.5765 16.8471 22.8221 16 21.1875 16C20.8769 16 20.625 16.2519 20.625 16.5625C20.625 16.8731 20.8769 17.125 21.1875 17.125C21.903 17.072 22.6127 17.2868 23.1787 17.7276C23.4265 17.9168 23.7041 18.0634 24 18.1614V23.9159C21.8264 24.1175 20.7596 25.5026 20.6371 28.3503C19.5393 28.2305 19.5 27.6285 19.5 25.5625C19.5 25.2517 19.2481 24.9999 18.9375 24.9999H17.25C16.6291 24.9992 16.1258 24.4959 16.1251 23.875V22.1875C16.1251 21.8769 15.8731 21.625 15.5625 21.625C15.2519 21.625 15 21.8769 15 22.1875V23.875C15.0012 25.1171 16.0079 26.1238 17.25 26.125H18.3768C18.3965 28.0515 18.6194 29.5 21.1875 29.5C21.4983 29.5 21.7501 29.2481 21.7501 28.9376C21.7501 26.0309 22.5984 25.1865 24 25.0316V25.5626C24 25.8733 24.2519 26.1251 24.5626 26.1251H27.9376C28.2481 26.1251 28.5 25.8733 28.5 25.5626V16.5625C28.5 16.2519 28.2481 16 27.9375 16ZM27.3751 25H25.125V17.1251H27.3751V25Z" fill="#2FB5D2"/>
                <path d="M19.5 17.6875V12.625C19.4988 11.3829 18.4921 10.3762 17.25 10.375H16.1233C16.1036 8.44868 15.8806 7 13.3126 7C13.0019 7 12.75 7.25186 12.75 7.5625C12.75 10.4691 11.9016 11.3135 10.5001 11.4685V10.9375C10.5001 10.6269 10.2481 10.375 9.9375 10.375H6.5625C6.25186 10.375 6 10.6269 6 10.9375V19.9375C6 20.2481 6.25186 20.5 6.5625 20.5H9.9375C10.2481 20.5 10.5 20.2481 10.5 19.9375V19.5823C10.9235 19.6926 11.5589 20.5 13.3125 20.5H16.6875C18.2401 20.4982 19.4982 19.2401 19.5 17.6875ZM9.375 19.375H7.125V11.5001H9.375V19.375ZM11.3212 18.7724C11.0734 18.5832 10.7959 18.4366 10.5 18.3384V12.5839C12.6736 12.3825 13.7404 10.9971 13.8629 8.14971C14.9607 8.26949 15 8.87151 15 10.9375C15 11.2481 15.2519 11.5 15.5625 11.5H17.25C17.8709 11.5008 18.3742 12.0041 18.3749 12.625V17.6875C18.3739 18.6191 17.6191 19.3739 16.6875 19.3749H13.3125C12.597 19.428 11.8873 19.2133 11.3212 18.7724Z" fill="#2FB5D2"/>
            </svg>
        </div>
        <div class="usefulness_text">
            <span class="usefulness_title">{l s='Are you satisfied with this article?'  mod='faqs'}</span>
            <span class="usefulness_info">
                {l s='Usefulness of the article:'  mod='faqs'}
                <span class="usefulness_like">{if $usefulness['like']}{$usefulness['like']|escape:'htmlall':'UTF-8'}{else}0{/if}</span> /
                <span class="usefulness_dislike">{if $usefulness['dislike']}{$usefulness['dislike']|escape:'htmlall':'UTF-8'}{else}0{/if}</span>
            </span>
        </div>
    </div>
    <div class="usefulness_right_column">
        <a data-type="like" class="like_button usefulness_button">
            {l s='Yes'  mod='faqs'}
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_230_190)">
                    <path d="M0 5.60001H2.79999V14H0V5.60001ZM8.39999 6.3L10.29 1.95999C10.43 1.68 10.29 1.26 10.01 1.11999L8.39999 0L4.2 6.3V13.3L5.60001 14H11.9L14 7.69997V6.3H8.39999Z" fill="#2ECC71"/>
                </g>
                <defs>
                    <clipPath id="clip0_230_190">
                        <rect width="14" height="14" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </a>
        <a data-type="dislike" class="dislike_button usefulness_button">
            {l s='No'  mod='faqs'}
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_230_196)">
                    <path d="M14 8.39999H11.2V-9.53674e-07H14V8.39999ZM5.60001 7.7L3.71001 12.04C3.57 12.32 3.71001 12.74 3.99 12.88L5.60001 14L9.8 7.7V0.700021L8.39999 3.24249e-05H2.1L-9.53674e-07 6.30003V7.7H5.60001Z" fill="#E74C3C"/>
                </g>
                <defs>
                    <clipPath id="clip0_230_196">
                        <rect width="14" height="14" fill="white" transform="matrix(-1 0 0 -1 14 14)"/>
                    </clipPath>
                </defs>
            </svg>
        </a>
    </div>
</div>