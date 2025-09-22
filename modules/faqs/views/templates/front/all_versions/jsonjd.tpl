

{if !empty($categories) && !empty($categories[0]['faqs'])}

    {assign var='current_question_index' value = 0}
    {assign var='total_number_of_questions' value = 0}

    {foreach $categories as $key => $category}
        {if isset($category['faqs']) && $category['faqs']}
            {$total_number_of_questions = $total_number_of_questions + count($category['faqs'])}
        {/if}
    {/foreach}

    <script type="application/ld+json">
        {
          "@context"  : "https://schema.org",
          "@type"     : "FAQPage",
          "mainEntity": [
                {foreach $categories as $key => $category}
                    {foreach $category['faqs'] as $k => $faq}
                        {$current_question_index = $current_question_index + 1}
                        {
                            "@type": "Question",
                            "name": "{str_replace('"', '\'', $faq['question'])|strip_tags|trim nofilter}",
                            "acceptedAnswer": {
                              "@type": "Answer",
                              "text": "{str_replace('"', '\'', $faq['answer'])|escape nofilter}"
                            }
                        }{if $current_question_index < $total_number_of_questions},{/if}
                    {/foreach}
                {/foreach}
              ]
          }
   </script>
{/if}


{if !empty($questions)}
    {assign var='current_question_index' value = 0}
    {assign var='total_number_of_questions' value = count($questions)}
    <script type="application/ld+json">
        {
          "@context"  : "https://schema.org",
          "@type"     : "FAQPage",
          "mainEntity": [
                {foreach $questions as $k => $faq}
                    {$current_question_index = $current_question_index + 1}
                    {
                        "@type": "Question",
                        "name": "{str_replace('"', '\'', $faq['question'])|strip_tags|trim nofilter}",
                        "acceptedAnswer": {
                          "@type": "Answer",
                          "text": "{str_replace('"', '\'', $faq['answer'])|escape nofilter}"
                        }
                    }{if $current_question_index < $total_number_of_questions},{/if}
                {/foreach}
              ]
          }
   </script>
{/if}


{if !empty($question_item)}
    <script type="application/ld+json">
        {
          "@context"  : "https://schema.org",
          "@type"     : "FAQPage",
          "mainEntity": [
                {
                    "@type": "Question",
                    "name": "{str_replace('"', '\'', $question_item['question'])|strip_tags|trim nofilter}",
                    "acceptedAnswer": {
                      "@type": "Answer",
                      "text": "{str_replace('"', '\'', $question_item['answer'])|escape nofilter}"
                    }
                }
              ]
          }
   </script>
{/if}

