# linkedin
How to post on linkedin using PHP API

Download latest version from zooman api or linkedin.
Step 1:
Login to Linkedin Developer Account.
Create a new app.


Step 2:
Download zip file.
Copy the folder and create linkedin folder on root directory and move the files over there.

Follow the instruction, open index.php
change your client id & client secret.
Also if you want to change post description and image.


// sharing on user profile
$share = $client->post(
                'people/~/shares',
                [
                    'comment' => 'I am Vinil Lakkavatri, Proud to be Indian | PHP Software Developer. I have Hands on Experience in PHP, MySQL, JavaScript, CSS, HTML, HTML5, CSS3,BOOTSTRAP, JQUERY, ANGULARJS & AJAX. I am an engineer by profession and internet surfer for new technologies by passion. I Always believe and love the quote ,DESTINY OF HARDWORK IS ALWAYS SUCCESS.',
                    'content' => [
                        'title' => 'How to post on LinkedIn using PHP API',
                        'description' => 'Post on linkedin wall and company page using php',
                        'submitted-url' => 'http://vinillakkavatri.xyz/',
                        'submitted-image-url' => 'http://vinillakkavatri.xyz/images/mypic1.jpg',
                    ],
                    'visibility' => [
                        'code' => 'anyone'
                    ]
                ]
            );

// sharing on company page
$companyId = '13678496';
            $cmp_share = $client->post(
                'companies/' . $companyId . '/shares',
                [
                    'comment' => 'I am Vinil Lakkavatri, Proud to be Indian | PHP Software Developer. I have Hands on Experience in PHP, MySQL, JavaScript, CSS, HTML, HTML5, CSS3,BOOTSTRAP, JQUERY, ANGULARJS & AJAX. I am an engineer by profession and internet surfer for new technologies by passion. I Always believe and love the quote ,DESTINY OF HARDWORK IS ALWAYS SUCCESS.',
                    'content' => [
                        'title' => 'How to post on LinkedIn using PHP API',
                        'description' => 'Post on linkedin wall and company page using php',
                        'submitted-url' => 'http://vinillakkavatri.xyz/',
                        'submitted-image-url' => 'http://vinillakkavatri.xyz/images/mypic1.jpg',
                    ],
                    'visibility' => [
                        'code' => 'anyone'
                    ]
                ]
            );

Step 3: 
Run your link and it will post on your linkedin profile & on linkedin company page.
