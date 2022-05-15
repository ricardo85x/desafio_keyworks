<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Rest Task Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
        body .content .javascript-example code {
            display: none;
        }

        body .content .bash-example code {
            display: none;
        }
    </style>

    <script>
        var baseUrl = "http://localhost:3005";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-3.28.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-3.28.0.js") }}"></script>

</head>

<body data-languages="[&quot;javascript&quot;,&quot;bash&quot;]">

    <a href="#" id="nav-button">
        <span>
            MENU
            <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
        </span>
    </a>
    <div class="tocify-wrapper">

        <div class="lang-selector">
            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
            <button type="button" class="lang-button" data-language-name="bash">bash</button>
        </div>

        <div class="search">
            <input type="text" class="search" id="input-search" placeholder="Search">
        </div>

        <div id="toc">
            

            <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="task-management">
                    <a href="#task-management">Task Management</a>
                </li>
                <ul id="tocify-subheader-task-management" class="tocify-subheader">
                    <li class="tocify-item level-2" data-unique="task-management-GETtasks">
                        <a href="#task-management-GETtasks">List all tasks</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="task-management-GETtask--id-">
                        <a href="#task-management-GETtask--id-">Display the specified task</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="task-management-POSTtask">
                        <a href="#task-management-POSTtask">Create a new task.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="task-management-POSTtask-order--id-">
                        <a href="#task-management-POSTtask-order--id-">Update position of the task</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="task-management-PATCHtask--id-">
                        <a href="#task-management-PATCHtask--id-">Update the specified task.</a>
                    </li>
                    <li class="tocify-item level-2" data-unique="task-management-DELETEtask--id-">
                        <a href="#task-management-DELETEtask--id-">Remove the specified task.</a>
                    </li>
                </ul>
            </ul>


        </div>

        <ul class="toc-footer" id="toc-footer">
            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
        </ul>
        <ul class="toc-footer" id="last-updated">
            <li>Last updated: May 15 2022</li>
        </ul>
    </div>

    <div class="page-wrapper">
        <div class="dark-box"></div>
        <div class="content">
            
            <blockquote>
                <p>Base URL</p>
            </blockquote>
            <pre><code class="language-yaml">http://localhost:3005</code></pre>

          

            <h2 id="task-management-GETtasks">List all tasks</h2>

            <p>
            </p>

            <p>Get a list of tasks</p>

            <span id="example-requests-GETtasks">
                <blockquote>Example request:</blockquote>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:3005/tasks"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:3005/tasks" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>

            </span>

            <span id="example-responses-GETtasks">
                <blockquote>
                    <p>Example response (200):</p>
                </blockquote>
                <details class="annotation">
                    <summary>
                        <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 16,
            &quot;category&quot;: &quot;pendency&quot;,
            &quot;time&quot;: &quot;1h&quot;,
            &quot;notifications&quot;: 0,
            &quot;tag&quot;: &quot;Desenvolvimento&quot;,
            &quot;code&quot;: &quot;#12345&quot;,
            &quot;title&quot;: &quot;Tarefa 1&quot;,
            &quot;project&quot;: &quot;Company&quot;,
            &quot;expected_date&quot;: &quot;2022-05-18&quot;,
            &quot;description&quot;: &quot;Le description&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;in-time&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;]&quot;,
            &quot;order&quot;: 1
        },
        {
            &quot;id&quot;: 9,
            &quot;category&quot;: &quot;wait&quot;,
            &quot;time&quot;: &quot;2h&quot;,
            &quot;notifications&quot;: 6,
            &quot;tag&quot;: &quot;DESENVOLVIMENTO&quot;,
            &quot;code&quot;: &quot;#9295&quot;,
            &quot;title&quot;: &quot;Yet you turned a.&quot;,
            &quot;project&quot;: &quot;Alice thought to.&quot;,
            &quot;expected_date&quot;: &quot;2022-06-13&quot;,
            &quot;description&quot;: &quot;Alice. 'I'm glad they've begun asking riddles.--I believe I can remember feeling a little.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;late&quot;,
            &quot;team&quot;: &quot;[\&quot;WO\&quot;]&quot;,
            &quot;order&quot;: 1
        },
        {
            &quot;id&quot;: 8,
            &quot;category&quot;: &quot;done&quot;,
            &quot;time&quot;: &quot;5h&quot;,
            &quot;notifications&quot;: 5,
            &quot;tag&quot;: &quot;DESENVOLVIMENTO&quot;,
            &quot;code&quot;: &quot;#9718&quot;,
            &quot;title&quot;: &quot;Pigeon in a deep.&quot;,
            &quot;project&quot;: &quot;Alice could think.&quot;,
            &quot;expected_date&quot;: &quot;2022-05-20&quot;,
            &quot;description&quot;: &quot;M--' 'Why with an important air, 'are you all ready? This is the capital of Rome, and Rome--no.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;in-time&quot;,
            &quot;team&quot;: &quot;[\&quot;AS\&quot;,\&quot;WO\&quot;]&quot;,
            &quot;order&quot;: 1
        },
        {
            &quot;id&quot;: 7,
            &quot;category&quot;: &quot;other&quot;,
            &quot;time&quot;: &quot;9h&quot;,
            &quot;notifications&quot;: 3,
            &quot;tag&quot;: &quot;DESENVOLVIMENTO&quot;,
            &quot;code&quot;: &quot;#9257&quot;,
            &quot;title&quot;: &quot;Who would not open.&quot;,
            &quot;project&quot;: &quot;Alice, 'or perhaps.&quot;,
            &quot;expected_date&quot;: &quot;2022-05-24&quot;,
            &quot;description&quot;: &quot;Alice soon came upon a little bird as soon as look at the window, and one foot up the fan and two.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;alert&quot;,
            &quot;team&quot;: &quot;[\&quot;WO\&quot;]&quot;,
            &quot;order&quot;: 1
        },
        {
            &quot;id&quot;: 4,
            &quot;category&quot;: &quot;running&quot;,
            &quot;time&quot;: &quot;1h&quot;,
            &quot;notifications&quot;: 2,
            &quot;tag&quot;: &quot;FINANCEIRO&quot;,
            &quot;code&quot;: &quot;#9001&quot;,
            &quot;title&quot;: &quot;D,' she added in.&quot;,
            &quot;project&quot;: &quot;Alice, very loudly.&quot;,
            &quot;expected_date&quot;: &quot;2022-06-14&quot;,
            &quot;description&quot;: &quot;Hatter, 'or you'll be telling me next that you had been jumping about like mad things all this.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;late&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;, \&quot;WO\&quot;]&quot;,
            &quot;order&quot;: 1
        },
        {
            &quot;id&quot;: 18,
            &quot;category&quot;: &quot;done&quot;,
            &quot;time&quot;: &quot;1h&quot;,
            &quot;notifications&quot;: 0,
            &quot;tag&quot;: &quot;Desenvolvimento&quot;,
            &quot;code&quot;: &quot;#12345&quot;,
            &quot;title&quot;: &quot;Tarefa 3&quot;,
            &quot;project&quot;: &quot;Company&quot;,
            &quot;expected_date&quot;: &quot;2022-05-31&quot;,
            &quot;description&quot;: &quot;Le description&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;in-time&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;]&quot;,
            &quot;order&quot;: 2
        },
        {
            &quot;id&quot;: 17,
            &quot;category&quot;: &quot;wait&quot;,
            &quot;time&quot;: &quot;1h&quot;,
            &quot;notifications&quot;: 0,
            &quot;tag&quot;: &quot;Desenvolvimento&quot;,
            &quot;code&quot;: &quot;#12345&quot;,
            &quot;title&quot;: &quot;Tarefa 2&quot;,
            &quot;project&quot;: &quot;Company&quot;,
            &quot;expected_date&quot;: &quot;2022-05-17&quot;,
            &quot;description&quot;: &quot;Le description&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;in-time&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;]&quot;,
            &quot;order&quot;: 2
        },
        {
            &quot;id&quot;: 13,
            &quot;category&quot;: &quot;running&quot;,
            &quot;time&quot;: &quot;1h&quot;,
            &quot;notifications&quot;: 3,
            &quot;tag&quot;: &quot;Desenvolvimento&quot;,
            &quot;code&quot;: &quot;12345&quot;,
            &quot;title&quot;: &quot;CRIAR MIGRATION 1&quot;,
            &quot;project&quot;: &quot;Company&quot;,
            &quot;expected_date&quot;: &quot;2022-05-25&quot;,
            &quot;description&quot;: &quot;Usar branch master, fazer pull, ap&oacute;s isto rodar o comando 'edge migration'&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;in-time&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;]&quot;,
            &quot;order&quot;: 2
        },
        {
            &quot;id&quot;: 12,
            &quot;category&quot;: &quot;pendency&quot;,
            &quot;time&quot;: &quot;6h&quot;,
            &quot;notifications&quot;: 1,
            &quot;tag&quot;: &quot;FINANCEIRO&quot;,
            &quot;code&quot;: &quot;#9307&quot;,
            &quot;title&quot;: &quot;Alice. 'Why, there.&quot;,
            &quot;project&quot;: &quot;I must have been a.&quot;,
            &quot;expected_date&quot;: &quot;2022-06-01&quot;,
            &quot;description&quot;: &quot;He sent them word I had it written up somewhere.' Down, down, down. Would the fall was over. Alice.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;alert&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;]&quot;,
            &quot;order&quot;: 2
        },
        {
            &quot;id&quot;: 11,
            &quot;category&quot;: &quot;other&quot;,
            &quot;time&quot;: &quot;8h&quot;,
            &quot;notifications&quot;: 5,
            &quot;tag&quot;: &quot;UI|UX&quot;,
            &quot;code&quot;: &quot;#9105&quot;,
            &quot;title&quot;: &quot;Said cunning old.&quot;,
            &quot;project&quot;: &quot;King said to the.&quot;,
            &quot;expected_date&quot;: &quot;2022-05-23&quot;,
            &quot;description&quot;: &quot;I'm a deal too flustered to tell him. 'A nice muddle their slates'll be in Bill's place for a.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;in-time&quot;,
            &quot;team&quot;: &quot;[\&quot;AS\&quot;,\&quot;WO\&quot;]&quot;,
            &quot;order&quot;: 2
        },
        {
            &quot;id&quot;: 19,
            &quot;category&quot;: &quot;wait&quot;,
            &quot;time&quot;: &quot;1h&quot;,
            &quot;notifications&quot;: 0,
            &quot;tag&quot;: &quot;Dev&quot;,
            &quot;code&quot;: &quot;12345&quot;,
            &quot;title&quot;: &quot;Some title&quot;,
            &quot;project&quot;: &quot;Company&quot;,
            &quot;expected_date&quot;: &quot;2022-12-31&quot;,
            &quot;description&quot;: &quot;Some Description&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;in-time&quot;,
            &quot;team&quot;: &quot;[]&quot;,
            &quot;order&quot;: 3
        },
        {
            &quot;id&quot;: 6,
            &quot;category&quot;: &quot;running&quot;,
            &quot;time&quot;: &quot;5h&quot;,
            &quot;notifications&quot;: 5,
            &quot;tag&quot;: &quot;UI|UX&quot;,
            &quot;code&quot;: &quot;#9983&quot;,
            &quot;title&quot;: &quot;There was nothing.&quot;,
            &quot;project&quot;: &quot;As they walked off.&quot;,
            &quot;expected_date&quot;: &quot;2022-06-12&quot;,
            &quot;description&quot;: &quot;But, now that I'm doubtful about the games now.' CHAPTER X. The Lobster Quadrille The Mock Turtle.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;late&quot;,
            &quot;team&quot;: &quot;[\&quot;AS\&quot;, \&quot;PH\&quot;]&quot;,
            &quot;order&quot;: 3
        },
        {
            &quot;id&quot;: 3,
            &quot;category&quot;: &quot;other&quot;,
            &quot;time&quot;: &quot;5h&quot;,
            &quot;notifications&quot;: 4,
            &quot;tag&quot;: &quot;FINANCEIRO&quot;,
            &quot;code&quot;: &quot;#9296&quot;,
            &quot;title&quot;: &quot;I must be a very.&quot;,
            &quot;project&quot;: &quot;Why, it fills the.&quot;,
            &quot;expected_date&quot;: &quot;2022-05-31&quot;,
            &quot;description&quot;: &quot;Alice began telling them her adventures from the sky! Ugh, Serpent!' 'But I'm NOT a serpent, I.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;alert&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;]&quot;,
            &quot;order&quot;: 3
        },
        {
            &quot;id&quot;: 1,
            &quot;category&quot;: &quot;pendency&quot;,
            &quot;time&quot;: &quot;2h&quot;,
            &quot;notifications&quot;: 7,
            &quot;tag&quot;: &quot;FINANCEIRO&quot;,
            &quot;code&quot;: &quot;#9671&quot;,
            &quot;title&quot;: &quot;Caterpillar took.&quot;,
            &quot;project&quot;: &quot;As she said these.&quot;,
            &quot;expected_date&quot;: &quot;2022-05-26&quot;,
            &quot;description&quot;: &quot;Alice quite jumped; but she did not like the Mock Turtle said: 'advance twice, set to work.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;late&quot;,
            &quot;team&quot;: &quot;[\&quot;AS\&quot;]&quot;,
            &quot;order&quot;: 3
        },
        {
            &quot;id&quot;: 20,
            &quot;category&quot;: &quot;wait&quot;,
            &quot;time&quot;: &quot;1h&quot;,
            &quot;notifications&quot;: 3,
            &quot;tag&quot;: &quot;Desenvolvimento&quot;,
            &quot;code&quot;: &quot;12345&quot;,
            &quot;title&quot;: &quot;CRIAR MIGRATION 1&quot;,
            &quot;project&quot;: &quot;Company&quot;,
            &quot;expected_date&quot;: &quot;2022-05-25&quot;,
            &quot;description&quot;: &quot;Usar branch master, fazer pull, ap&oacute;s isto rodar o comando 'edge migration'&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;late&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;]&quot;,
            &quot;order&quot;: 4
        },
        {
            &quot;id&quot;: 5,
            &quot;category&quot;: &quot;pendency&quot;,
            &quot;time&quot;: &quot;4h&quot;,
            &quot;notifications&quot;: 7,
            &quot;tag&quot;: &quot;UI|UX&quot;,
            &quot;code&quot;: &quot;#9197&quot;,
            &quot;title&quot;: &quot;Edwin and Morcar.&quot;,
            &quot;project&quot;: &quot;Alice noticed, had.&quot;,
            &quot;expected_date&quot;: &quot;2022-05-28&quot;,
            &quot;description&quot;: &quot;March Hare moved into the open air. 'IF I don't believe it,' said the Hatter. 'I deny it!' said.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;late&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;, \&quot;WO\&quot;]&quot;,
            &quot;order&quot;: 4
        },
        {
            &quot;id&quot;: 2,
            &quot;category&quot;: &quot;other&quot;,
            &quot;time&quot;: &quot;6h&quot;,
            &quot;notifications&quot;: 2,
            &quot;tag&quot;: &quot;UI|UX&quot;,
            &quot;code&quot;: &quot;#9089&quot;,
            &quot;title&quot;: &quot;Paris, and Paris.&quot;,
            &quot;project&quot;: &quot;White Rabbit put.&quot;,
            &quot;expected_date&quot;: &quot;2022-05-18&quot;,
            &quot;description&quot;: &quot;And so it was not easy to take out of sight, they were trying which word sounded best. Some of the.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;alert&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;]&quot;,
            &quot;order&quot;: 4
        },
        {
            &quot;id&quot;: 10,
            &quot;category&quot;: &quot;other&quot;,
            &quot;time&quot;: &quot;6h&quot;,
            &quot;notifications&quot;: 9,
            &quot;tag&quot;: &quot;UI|UX&quot;,
            &quot;code&quot;: &quot;#9474&quot;,
            &quot;title&quot;: &quot;HE was.' 'I never.&quot;,
            &quot;project&quot;: &quot;Then followed the.&quot;,
            &quot;expected_date&quot;: &quot;2022-05-29&quot;,
            &quot;description&quot;: &quot;Adventures of hers would, in the prisoner's handwriting?' asked another of the leaves: 'I should.&quot;,
            &quot;expected&quot;: &quot;00:30&quot;,
            &quot;balance&quot;: &quot;+00:10&quot;,
            &quot;status&quot;: &quot;late&quot;,
            &quot;team&quot;: &quot;[\&quot;PH\&quot;, \&quot;WO\&quot;]&quot;,
            &quot;order&quot;: 5
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost/tasks?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost/tasks?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost/tasks?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost/tasks&quot;,
        &quot;per_page&quot;: 100,
        &quot;to&quot;: 18,
        &quot;total&quot;: 18
    }
}</code>
 </pre>
            </span>
            <span id="execution-results-GETtasks" hidden>
                <blockquote>Received response<span id="execution-response-status-GETtasks"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETtasks"></code></pre>
            </span>
            <span id="execution-error-GETtasks" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETtasks"></code></pre>
            </span>
            <form id="form-GETtasks" data-method="GET" data-path="tasks" data-authed="0" data-hasfiles="0" data-isarraybody="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' autocomplete="off" onsubmit="event.preventDefault(); executeTryOut('GETtasks', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETtasks" onclick="tryItOut('GETtasks');">Try it out ⚡
                    </button>
                    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETtasks" onclick="cancelTryOut('GETtasks');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETtasks" hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>tasks</code></b>
                </p>
            </form>

            <h2 id="task-management-GETtask--id-">Display the specified task</h2>

            <p>
            </p>



            <span id="example-requests-GETtask--id-">
                <blockquote>Example request:</blockquote>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:3005/task/3"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:3005/task/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>

            </span>

            <span id="example-responses-GETtask--id-">
                <blockquote>
                    <p>Example response (200):</p>
                </blockquote>
                <details class="annotation">
                    <summary>
                        <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
                    </summary>
                    <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre>
                </details>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: 3,
        &quot;category&quot;: &quot;other&quot;,
        &quot;time&quot;: &quot;5h&quot;,
        &quot;notifications&quot;: 4,
        &quot;tag&quot;: &quot;FINANCEIRO&quot;,
        &quot;code&quot;: &quot;#9296&quot;,
        &quot;title&quot;: &quot;I must be a very.&quot;,
        &quot;project&quot;: &quot;Why, it fills the.&quot;,
        &quot;expected_date&quot;: &quot;2022-05-31&quot;,
        &quot;description&quot;: &quot;Alice began telling them her adventures from the sky! Ugh, Serpent!' 'But I'm NOT a serpent, I.&quot;,
        &quot;expected&quot;: &quot;00:30&quot;,
        &quot;balance&quot;: &quot;+00:10&quot;,
        &quot;status&quot;: &quot;alert&quot;,
        &quot;team&quot;: &quot;[\&quot;PH\&quot;]&quot;,
        &quot;order&quot;: 3
    }
}</code>
 </pre>
            </span>
            <span id="execution-results-GETtask--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-GETtask--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-GETtask--id-"></code></pre>
            </span>
            <span id="execution-error-GETtask--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-GETtask--id-"></code></pre>
            </span>
            <form id="form-GETtask--id-" data-method="GET" data-path="task/{id}" data-authed="0" data-hasfiles="0" data-isarraybody="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' autocomplete="off" onsubmit="event.preventDefault(); executeTryOut('GETtask--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETtask--id-" onclick="tryItOut('GETtask--id-');">Try it out ⚡
                    </button>
                    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETtask--id-" onclick="cancelTryOut('GETtask--id-');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETtask--id-" hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-green">GET</small>
                    <b><code>task/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <p>
                    <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small> &nbsp;
                    <input type="number" name="id" data-endpoint="GETtask--id-" value="3" data-component="url" hidden>
                    <br>
                <p>The ID of the task.</p>
                </p>
            </form>

            <h2 id="task-management-POSTtask">Create a new task.</h2>

            <p>
            </p>

            <p>Used to create a new task</p>

            <span id="example-requests-POSTtask">
                <blockquote>Example request:</blockquote>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:3005/task"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "category": "wait",
    "time": "1h",
    "notifications": 0,
    "tag": "Dev",
    "code": "12345",
    "title": "Some title",
    "project": "Company",
    "expected_date": "2022-12-31",
    "description": "Some Description",
    "expected": "00:30",
    "balance": "+00:10",
    "status": "in-time",
    "team": "[]"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request POST \
    "http://localhost:3005/task" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"category\": \"wait\",
    \"time\": \"1h\",
    \"notifications\": 0,
    \"tag\": \"Dev\",
    \"code\": \"12345\",
    \"title\": \"Some title\",
    \"project\": \"Company\",
    \"expected_date\": \"2022-12-31\",
    \"description\": \"Some Description\",
    \"expected\": \"00:30\",
    \"balance\": \"+00:10\",
    \"status\": \"in-time\",
    \"team\": \"[]\"
}"
</code></pre>
                </div>

            </span>

            <span id="example-responses-POSTtask">
            </span>
            <span id="execution-results-POSTtask" hidden>
                <blockquote>Received response<span id="execution-response-status-POSTtask"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-POSTtask"></code></pre>
            </span>
            <span id="execution-error-POSTtask" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-POSTtask"></code></pre>
            </span>
            <form id="form-POSTtask" data-method="POST" data-path="task" data-authed="0" data-hasfiles="0" data-isarraybody="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' autocomplete="off" onsubmit="event.preventDefault(); executeTryOut('POSTtask', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTtask" onclick="tryItOut('POSTtask');">Try it out ⚡
                    </button>
                    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTtask" onclick="cancelTryOut('POSTtask');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTtask" hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-black">POST</small>
                    <b><code>task</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <p>
                    <b><code>category</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="category" data-endpoint="POSTtask" value="wait" data-component="body" hidden>
                    <br>
                <p>The category of the task. Defaults to 'wait'.</p>
                </p>
                <p>
                    <b><code>time</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="time" data-endpoint="POSTtask" value="1h" data-component="body" hidden>
                    <br>
                <p>The time of the task. Defaults to '1h'.</p>
                </p>
                <p>
                    <b><code>notifications</code></b>&nbsp;&nbsp;<small>integer</small> &nbsp;
                    <input type="number" name="notifications" data-endpoint="POSTtask" value="0" data-component="body" hidden>
                    <br>
                <p>The number of notifications of the task. Defaults to 0.</p>
                </p>
                <p>
                    <b><code>tag</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="tag" data-endpoint="POSTtask" value="Dev" data-component="body" hidden>
                    <br>
                <p>The number of tag of the task. Defaults to 'Dev'.</p>
                </p>
                <p>
                    <b><code>code</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="code" data-endpoint="POSTtask" value="12345" data-component="body" hidden>
                    <br>
                <p>The number of code of the task. Defaults to '12345'.</p>
                </p>
                <p>
                    <b><code>title</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="title" data-endpoint="POSTtask" value="Some title" data-component="body" hidden>
                    <br>
                <p>The number of title of the task. Defaults to 'Some title'.</p>
                </p>
                <p>
                    <b><code>project</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="project" data-endpoint="POSTtask" value="Company" data-component="body" hidden>
                    <br>
                <p>The number of project of the task. Defaults to 'Company'.</p>
                </p>
                <p>
                    <b><code>expected_date</code></b>&nbsp;&nbsp;<small>date</small> &nbsp;
                    <input type="text" name="expected_date" data-endpoint="POSTtask" value="2022-12-31" data-component="body" hidden>
                    <br>
                <p>The number of expected_date of the task. Defaults to '2022-12-31'.</p>
                </p>
                <p>
                    <b><code>description</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="description" data-endpoint="POSTtask" value="Some Description" data-component="body" hidden>
                    <br>
                <p>The number of description of the task. Defaults to' Some description'.</p>
                </p>
                <p>
                    <b><code>expected</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="expected" data-endpoint="POSTtask" value="00:30" data-component="body" hidden>
                    <br>
                <p>The number of expected of the task. Defaults to '00:30.'</p>
                </p>
                <p>
                    <b><code>balance</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="balance" data-endpoint="POSTtask" value="+00:10" data-component="body" hidden>
                    <br>
                <p>The number of balance of the task. Defaults to '+00:10'.</p>
                </p>
                <p>
                    <b><code>status</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="status" data-endpoint="POSTtask" value="in-time" data-component="body" hidden>
                    <br>
                <p>The number of status of the task. Defaults to 'in-time'.</p>
                </p>
                <p>
                    <b><code>team</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="team" data-endpoint="POSTtask" value="[]" data-component="body" hidden>
                    <br>
                <p>The number of team of the task. Defaults to '[]'.</p>
                </p>
            </form>

            <h2 id="task-management-POSTtask-order--id-">Update position of the task</h2>

            <p>
            </p>

            <p>Used to move task up/down right and left</p>

            <span id="example-requests-POSTtask-order--id-">
                <blockquote>Example request:</blockquote>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:3005/task-order/14"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "category": "wait",
    "order": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request POST \
    "http://localhost:3005/task-order/14" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"category\": \"wait\",
    \"order\": 1
}"
</code></pre>
                </div>

            </span>

            <span id="example-responses-POSTtask-order--id-">
            </span>
            <span id="execution-results-POSTtask-order--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-POSTtask-order--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-POSTtask-order--id-"></code></pre>
            </span>
            <span id="execution-error-POSTtask-order--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-POSTtask-order--id-"></code></pre>
            </span>
            <form id="form-POSTtask-order--id-" data-method="POST" data-path="task-order/{id}" data-authed="0" data-hasfiles="0" data-isarraybody="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' autocomplete="off" onsubmit="event.preventDefault(); executeTryOut('POSTtask-order--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTtask-order--id-" onclick="tryItOut('POSTtask-order--id-');">Try it out ⚡
                    </button>
                    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTtask-order--id-" onclick="cancelTryOut('POSTtask-order--id-');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTtask-order--id-" hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-black">POST</small>
                    <b><code>task-order/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <p>
                    <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small> &nbsp;
                    <input type="number" name="id" data-endpoint="POSTtask-order--id-" value="14" data-component="url" hidden>
                    <br>
                <p>ID of the task</p>
                </p>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <p>
                    <b><code>category</code></b>&nbsp;&nbsp;<small>string</small> &nbsp;
                    <input type="text" name="category" data-endpoint="POSTtask-order--id-" value="wait" data-component="body" hidden>
                    <br>
                <p>The category of the task.</p>
                </p>
                <p>
                    <b><code>order</code></b>&nbsp;&nbsp;<small>integer</small> &nbsp;
                    <input type="number" name="order" data-endpoint="POSTtask-order--id-" value="1" data-component="body" hidden>
                    <br>
                <p>The position the task will be placed.</p>
                </p>
            </form>

            <h2 id="task-management-PATCHtask--id-">Update the specified task.</h2>

            <p>
            </p>

            <p>Update one or multiple attributes of the task.
                To update the <strong>category</strong> or <strong>order</strong> use the <strong> /task-order/{id} </strong></p>

            <span id="example-requests-PATCHtask--id-">
                <blockquote>Example request:</blockquote>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:3005/task/4"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "time": "1h",
    "notifications": 0,
    "tag": "Dev",
    "code": "12345",
    "title": "Some title",
    "project": "Company",
    "expected_date": "2022-12-31",
    "description": "Some Description",
    "expected": "00:30",
    "balance": "+00:10",
    "status": "in-time",
    "team": "[]"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
                </div>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost:3005/task/4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"time\": \"1h\",
    \"notifications\": 0,
    \"tag\": \"Dev\",
    \"code\": \"12345\",
    \"title\": \"Some title\",
    \"project\": \"Company\",
    \"expected_date\": \"2022-12-31\",
    \"description\": \"Some Description\",
    \"expected\": \"00:30\",
    \"balance\": \"+00:10\",
    \"status\": \"in-time\",
    \"team\": \"[]\"
}"
</code></pre>
                </div>

            </span>

            <span id="example-responses-PATCHtask--id-">
            </span>
            <span id="execution-results-PATCHtask--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-PATCHtask--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-PATCHtask--id-"></code></pre>
            </span>
            <span id="execution-error-PATCHtask--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-PATCHtask--id-"></code></pre>
            </span>
            <form id="form-PATCHtask--id-" data-method="PATCH" data-path="task/{id}" data-authed="0" data-hasfiles="0" data-isarraybody="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' autocomplete="off" onsubmit="event.preventDefault(); executeTryOut('PATCHtask--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHtask--id-" onclick="tryItOut('PATCHtask--id-');">Try it out ⚡
                    </button>
                    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHtask--id-" onclick="cancelTryOut('PATCHtask--id-');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHtask--id-" hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-purple">PATCH</small>
                    <b><code>task/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <p>
                    <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small> &nbsp;
                    <input type="number" name="id" data-endpoint="PATCHtask--id-" value="4" data-component="url" hidden>
                    <br>
                <p>The ID of the task.</p>
                </p>
                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
                <p>
                    <b><code>time</code></b>&nbsp;&nbsp;<small>string</small> <i>optional</i> &nbsp;
                    <input type="text" name="time" data-endpoint="PATCHtask--id-" value="1h" data-component="body" hidden>
                    <br>
                <p>The time of the task. Defaults to '1h'.</p>
                </p>
                <p>
                    <b><code>notifications</code></b>&nbsp;&nbsp;<small>integer</small> <i>optional</i> &nbsp;
                    <input type="number" name="notifications" data-endpoint="PATCHtask--id-" value="0" data-component="body" hidden>
                    <br>
                <p>The number of notifications of the task.</p>
                </p>
                <p>
                    <b><code>tag</code></b>&nbsp;&nbsp;<small>string</small> <i>optional</i> &nbsp;
                    <input type="text" name="tag" data-endpoint="PATCHtask--id-" value="Dev" data-component="body" hidden>
                    <br>
                <p>The number of tag of the task.</p>
                </p>
                <p>
                    <b><code>code</code></b>&nbsp;&nbsp;<small>string</small> <i>optional</i> &nbsp;
                    <input type="text" name="code" data-endpoint="PATCHtask--id-" value="12345" data-component="body" hidden>
                    <br>
                <p>The number of code of the task.</p>
                </p>
                <p>
                    <b><code>title</code></b>&nbsp;&nbsp;<small>string</small> <i>optional</i> &nbsp;
                    <input type="text" name="title" data-endpoint="PATCHtask--id-" value="Some title" data-component="body" hidden>
                    <br>
                <p>The number of title of the task.</p>
                </p>
                <p>
                    <b><code>project</code></b>&nbsp;&nbsp;<small>string</small> <i>optional</i> &nbsp;
                    <input type="text" name="project" data-endpoint="PATCHtask--id-" value="Company" data-component="body" hidden>
                    <br>
                <p>The number of project of the task.</p>
                </p>
                <p>
                    <b><code>expected_date</code></b>&nbsp;&nbsp;<small>date</small> <i>optional</i> &nbsp;
                    <input type="text" name="expected_date" data-endpoint="PATCHtask--id-" value="2022-12-31" data-component="body" hidden>
                    <br>
                <p>The number of expected_date of the task.</p>
                </p>
                <p>
                    <b><code>description</code></b>&nbsp;&nbsp;<small>string</small> <i>optional</i> &nbsp;
                    <input type="text" name="description" data-endpoint="PATCHtask--id-" value="Some Description" data-component="body" hidden>
                    <br>
                <p>The number of description of the task.</p>
                </p>
                <p>
                    <b><code>expected</code></b>&nbsp;&nbsp;<small>string</small> <i>optional</i> &nbsp;
                    <input type="text" name="expected" data-endpoint="PATCHtask--id-" value="00:30" data-component="body" hidden>
                    <br>
                <p>The number of expected of the task.</p>
                </p>
                <p>
                    <b><code>balance</code></b>&nbsp;&nbsp;<small>string</small> <i>optional</i> &nbsp;
                    <input type="text" name="balance" data-endpoint="PATCHtask--id-" value="+00:10" data-component="body" hidden>
                    <br>
                <p>The number of balance of the task.</p>
                </p>
                <p>
                    <b><code>status</code></b>&nbsp;&nbsp;<small>string</small> <i>optional</i> &nbsp;
                    <input type="text" name="status" data-endpoint="PATCHtask--id-" value="in-time" data-component="body" hidden>
                    <br>
                <p>The number of status of the task.</p>
                </p>
                <p>
                    <b><code>team</code></b>&nbsp;&nbsp;<small>string</small> <i>optional</i> &nbsp;
                    <input type="text" name="team" data-endpoint="PATCHtask--id-" value="[]" data-component="body" hidden>
                    <br>
                <p>The number of team of the task.</p>
                </p>
            </form>

            <h2 id="task-management-DELETEtask--id-">Remove the specified task.</h2>

            <p>
            </p>



            <span id="example-requests-DELETEtask--id-">
                <blockquote>Example request:</blockquote>


                <div class="javascript-example">
                    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:3005/task/15"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
                </div>


                <div class="bash-example">
                    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:3005/task/15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>
                </div>

            </span>

            <span id="example-responses-DELETEtask--id-">
            </span>
            <span id="execution-results-DELETEtask--id-" hidden>
                <blockquote>Received response<span id="execution-response-status-DELETEtask--id-"></span>:
                </blockquote>
                <pre class="json"><code id="execution-response-content-DELETEtask--id-"></code></pre>
            </span>
            <span id="execution-error-DELETEtask--id-" hidden>
                <blockquote>Request failed with error:</blockquote>
                <pre><code id="execution-error-message-DELETEtask--id-"></code></pre>
            </span>
            <form id="form-DELETEtask--id-" data-method="DELETE" data-path="task/{id}" data-authed="0" data-hasfiles="0" data-isarraybody="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' autocomplete="off" onsubmit="event.preventDefault(); executeTryOut('DELETEtask--id-', this);">
                <h3>
                    Request&nbsp;&nbsp;&nbsp;
                    <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEtask--id-" onclick="tryItOut('DELETEtask--id-');">Try it out ⚡
                    </button>
                    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEtask--id-" onclick="cancelTryOut('DELETEtask--id-');" hidden>Cancel 🛑
                    </button>&nbsp;&nbsp;
                    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEtask--id-" hidden>Send Request 💥
                    </button>
                </h3>
                <p>
                    <small class="badge badge-red">DELETE</small>
                    <b><code>task/{id}</code></b>
                </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                <p>
                    <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small> &nbsp;
                    <input type="number" name="id" data-endpoint="DELETEtask--id-" value="15" data-component="url" hidden>
                    <br>
                <p>The ID of the task.</p>
                </p>
            </form>




        </div>
        <div class="dark-box">
            <div class="lang-selector">
                <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                <button type="button" class="lang-button" data-language-name="bash">bash</button>
            </div>
        </div>
    </div>
</body>

</html>