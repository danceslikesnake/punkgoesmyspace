@extends('shared.layout')

@section('content')
    <div id="profile_editor" class="container main-content-wrapper normal-width is-paddingless">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="editor-wrapper">
            @include('pages.profile.components.editor-navigation')
            <div class="editor-content">
                <header class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h2><i class="fas fa-fw fa-palette"></i> profile styles</h2>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <button class="button-cta outline"><i class="fas fa-undo-alt fa-fw"></i> reset</button>
                        </div>
                        <div class="level-item">
                            <button class="button-cta solid"><i class="fas fa-save fa-fw"></i> save</button>
                        </div>
                    </div>
                </header>
                <div class="form">
                    <section class="form-module">
                        <header>
                            <ul class="level options-tabs">
                                <li class="level-item has-text-centered active-tab">General</li>
                                <li class="level-item has-text-centered">Header</li>
                                <li class="level-item has-text-centered">Left Module</li>
                                <li class="level-item has-text-centered">Right Module</li>
                                <li class="level-item has-text-centered">Background</li>
                            </ul>
                        </header>
                        <div id="option_set_0" class="is-clearfix options-group">
                            <div class="columns is-multiline">
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Text Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Link Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="option_set_1" class="is-clearfix options-group" style="display: none;">
                            <div class="columns is-multiline">
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">BG Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">BG Gradient Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Text Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="option_set_2" class="is-clearfix options-group" style="display: none;">
                            <div class="columns is-multiline">
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Base Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Header Text Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Text Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Icon Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="option_set_3" class="is-clearfix options-group" style="display: none;">
                            <div class="columns is-multiline">
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Base Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">Header Text Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="option_set_4" class="is-clearfix options-group" style="display: none;">
                            <div class="columns is-multiline">
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">BG Color</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">BG Image</label>
                                        <div class="control">
                                            <input class="input" type="file" placeholder="Text input">
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">BG Image Fill</label>
                                        <div class="control">
                                            <div class="select">
                                                <select disabled>
                                                    <option>Default</option>
                                                    <option>Cover</option>
                                                    <option>Contain</option>
                                                    <option>Tile</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-half">
                                    <div class="field">
                                        <label class="label">BG Image Position</label>
                                        <div class="control">
                                            <div class="select">
                                                <select disabled>
                                                    <option>Top Left</option>
                                                    <option>Top Center</option>
                                                    <option>Top Right</option>
                                                    <option>Center Left</option>
                                                    <option>Center Center</option>
                                                    <option>Center Right</option>
                                                    <option>Bottom Left</option>
                                                    <option>Bottom Center</option>
                                                    <option>Bottom Right</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="has-text-centered divider-headline">theme preview</div>
                    <section class="form-module contains-preview">
                        <div class="editor-preview-canvas">
                            <div class="editor-preview-content">
                                <svg width="301px" height="357px" viewBox="0 0 301 357" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 55.2 (78181) - https://sketchapp.com -->
                                    <title>editable-content-mockup</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs>
                                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1">
                                            <stop stop-color="#000000" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#000000" stop-opacity="0.3" offset="100%"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="Theme-Editor" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="02-Photo-Albums-Copy-3" transform="translate(-771.000000, -234.000000)">
                                            <g id="editable-content-mockup" transform="translate(771.000000, 234.000000)">
                                                <rect id="header-bg" fill="#2358B8" transform="translate(150.500000, 23.000000) scale(-1, 1) translate(-150.500000, -23.000000) " x="0" y="0" width="301" height="46"></rect>
                                                <rect id="header-scrim" fill="url(#linearGradient-1)" transform="translate(150.500000, 29.000000) scale(-1, 1) translate(-150.500000, -29.000000) " x="0" y="12" width="301" height="34"></rect>
                                                <path d="M6,29 L64,29 L64,33 L6,33 L6,29 Z M279,29 L294,29 L294,33 L279,33 L279,29 Z M6,39 L24,39 L24,40 L6,40 L6,39 Z M29,39 L47,39 L47,40 L29,40 L29,39 Z M52,39 L70,39 L70,40 L52,40 L52,39 Z M75,39 L93,39 L93,40 L75,40 L75,39 Z M276,39 L294,39 L294,40 L276,40 L276,39 Z" id="header-text-color" fill="#FFFFFF"></path>
                                                <path d="M11,54 L69,54 L69,58 L11,58 L11,54 Z M131,131 L189,131 L189,135 L131,135 L131,131 Z M60,64 L118,64 L118,65 L60,65 L60,64 Z M131,143 L220,143 L220,144 L131,144 L131,143 Z M131,149 L220,149 L220,150 L131,150 L131,149 Z M131,155 L220,155 L220,156 L131,156 L131,155 Z M131,188 L293,188 L293,189 L131,189 L131,188 Z M131,200 L293,200 L293,201 L131,201 L131,200 Z M131,161 L220,161 L220,162 L131,162 L131,161 Z M131,194 L293,194 L293,195 L131,195 L131,194 Z M60,70 L118,70 L118,71 L60,71 L60,70 Z M60,76 L118,76 L118,77 L60,77 L60,76 Z M60,82 L118,82 L118,83 L60,83 L60,82 Z M11,114 L69,114 L69,115 L11,115 L11,114 Z M11,120 L32,120 L32,121 L11,121 L11,120 Z M16,197 L105,197 L105,198 L16,198 L16,197 Z M11,187 L69,187 L69,189 L11,189 L11,187 Z" id="content-text-color" fill="#000000"></path>
                                                <path d="M226,143 L254,143 L254,144 L226,144 L226,143 Z M135,226 L163,226 L163,227 L135,227 L135,226 Z M135,271 L163,271 L163,272 L135,272 L135,271 Z M177,226 L205,226 L205,227 L177,227 L177,226 Z M177,271 L205,271 L205,272 L177,272 L177,271 Z M219,226 L247,226 L247,227 L219,227 L219,226 Z M219,271 L247,271 L247,272 L219,272 L219,271 Z M261,226 L289,226 L289,227 L261,227 L261,226 Z M261,271 L289,271 L289,272 L261,272 L261,271 Z M226,149 L254,149 L254,150 L226,150 L226,149 Z M226,155 L254,155 L254,156 L226,156 L226,155 Z M226,161 L254,161 L254,162 L226,162 L226,161 Z M36,120 L57,120 L57,121 L36,121 L36,120 Z M27,148 L57,148 L57,149 L27,149 L27,148 Z M27,158 L57,158 L57,159 L27,159 L27,158 Z M78,148 L108,148 L108,149 L78,149 L78,148 Z M78,158 L108,158 L108,159 L78,159 L78,158 Z M27,168 L57,168 L57,169 L27,169 L27,168 Z M78,168 L108,168 L108,169 L78,169 L78,168 Z M61,120 L82,120 L82,121 L61,121 L61,120 Z M135,316 L163,316 L163,317 L135,317 L135,316 Z M177,316 L205,316 L205,317 L177,317 L177,316 Z M219,316 L247,316 L247,317 L219,317 L219,316 Z M261,316 L289,316 L289,317 L261,317 L261,316 Z" id="content-link-color" fill="#2358B8"></path>
                                                <path d="M131,54 L293,54 L293,122 L131,122 L131,54 Z M11,64 L53,64 L53,106 L11,106 L11,64 Z M131,231 L167,231 L167,267 L131,267 L131,231 Z M131,276 L167,276 L167,312 L131,312 L131,276 Z M173,231 L209,231 L209,267 L173,267 L173,231 Z M173,276 L209,276 L209,312 L173,312 L173,276 Z M215,231 L251,231 L251,267 L215,267 L215,231 Z M215,276 L251,276 L251,312 L215,312 L215,276 Z M257,231 L293,231 L293,267 L257,267 L257,231 Z M257,276 L293,276 L293,312 L257,312 L257,276 Z M131,321 L167,321 L167,357 L131,357 L131,321 Z M173,321 L209,321 L209,357 L173,357 L173,321 Z M215,321 L251,321 L251,357 L215,357 L215,321 Z M257,321 L293,321 L293,357 L257,357 L257,321 Z M6,4 L294,4 L294,23 L6,23 L6,4 Z" id="unaffected-items" fill="#000000"></path>
                                                <path d="M212.5,69 C201.735685,69 193,77.7356855 193,88.5 C193,99.2643145 201.735685,108 212.5,108 C223.264315,108 232,99.2643145 232,88.5 C232,77.7356855 223.264315,69 212.5,69 Z M219.832117,97 C219.509412,97 219.309643,96.9058322 219.009988,96.7392277 C214.215521,94.015606 208.637342,93.8997072 203.128313,94.9645274 C202.828659,95.0369641 202.436804,95.1528629 202.213984,95.1528629 C201.46869,95.1528629 201,94.5951 201,94.0083623 C201,93.2622638 201.46869,92.9073237 202.044948,92.7914249 C208.337687,91.4803198 214.768728,91.5962186 220.254706,94.6892677 C220.723396,94.971771 221,95.2252997 221,95.8844741 C221,96.5436485 220.454476,97 219.832117,97 L219.832117,97 Z M222.456233,93 C222.04244,93 221.763926,92.8099174 221.477454,92.6528926 C216.503979,89.5950413 209.087533,88.3636364 202.490716,90.2231405 C202.108753,90.3305785 201.901857,90.4380165 201.543767,90.4380165 C200.692308,90.4380165 200,89.7190083 200,88.8347107 C200,87.9504132 200.413793,87.3636364 201.233422,87.1239669 C203.445623,86.4793388 205.70557,86 209.015915,86 C214.180371,86 219.169761,87.3305785 223.100796,89.7603306 C223.745358,90.1570248 224,90.6694215 224,91.3884298 C223.992042,92.2809917 223.323607,93 222.456233,93 L222.456233,93 Z M225.160815,86 C224.748584,86 224.494904,85.9028815 224.138165,85.7086446 C218.493771,82.5336179 208.402039,81.7716115 201.869762,83.4898613 C201.584371,83.5645678 201.227633,83.6840982 200.847112,83.6840982 C199.80068,83.6840982 199,82.9146211 199,81.9210245 C199,80.905016 199.665912,80.3297759 200.379388,80.135539 C203.169875,79.3660619 206.293318,79 209.694224,79 C215.481314,79 221.545866,80.135539 225.97735,82.5709712 C226.595696,82.9071505 227,83.3703308 227,84.2593383 C227,85.2753469 226.127973,86 225.160815,86 L225.160815,86 Z" id="spotify-logo" fill="#FFFFFF" fill-rule="nonzero"></path>
                                                <path d="M11.5,131.5 L11.5,177.5 L117.5,177.5 L117.5,131.5 L11.5,131.5 Z M11.5,208.5 L11.5,246.5 L117.5,246.5 L117.5,208.5 L11.5,208.5 Z M11.5,193.5 L11.5,202.5 L117.5,202.5 L117.5,193.5 L11.5,193.5 Z M11.5,177.5 L11.5,140.5 L117.5,140.5 L117.5,177.5 L11.5,177.5 Z M11.5,202.5 L11.5,193.5 L117.5,193.5 L117.5,202.5 L11.5,202.5 Z M11.5,217.5 L117.5,217.5 L117.5,246.5 L11.5,246.5 L11.5,217.5 Z" id="content-left-module-base-color" stroke="#6699CC" fill="#6699CC"></path>
                                                <path d="M14,221 L53,221 L53,230 L14,230 L14,221 Z M14,232 L53,232 L53,241 L14,241 L14,232 Z" id="content-left-module-shade-color" fill="#B1D0F0"></path>
                                                <path d="M56,221 L114,221 L114,230 L56,230 L56,221 Z M56,232 L114,232 L114,241 L56,241 L56,232 Z" id="content-left-module-lighten-color" fill="#D5E8FB"></path>
                                                <path d="M16,134 L63,134 L63,138 L16,138 L16,134 Z M16,211 L63,211 L63,215 L16,215 L16,211 Z" id="content-left-module-header-text-color" fill="#FFFFFF"></path>
                                                <path d="M17,225 L50,225 L50,226 L17,226 L17,225 Z M60,225 L109,225 L109,226 L60,226 L60,225 Z M17,236 L50,236 L50,237 L17,237 L17,236 Z M60,236 L109,236 L109,237 L60,237 L60,236 Z" id="content-left-module-text-color" fill="#000000"></path>
                                                <path d="M131,171 L293,171 L293,181 L131,181 L131,171 Z M131,208 L293,208 L293,218 L131,218 L131,208 Z" id="content-right-module-base-color" fill="#FFCC99"></path>
                                                <path d="M136,174 L183,174 L183,178 L136,178 L136,174 Z M136,211 L183,211 L183,215 L136,215 L136,211 Z" id="content-right-module-header-text-color" fill="#FF6600"></path>
                                                <path d="M19.5,151 C18.1192881,151 17,149.880712 17,148.5 C17,147.119288 18.1192881,146 19.5,146 C20.8807119,146 22,147.119288 22,148.5 C22,149.880712 20.8807119,151 19.5,151 Z M70.5,151 C69.1192881,151 68,149.880712 68,148.5 C68,147.119288 69.1192881,146 70.5,146 C71.8807119,146 73,147.119288 73,148.5 C73,149.880712 71.8807119,151 70.5,151 Z M19.5,161 C18.1192881,161 17,159.880712 17,158.5 C17,157.119288 18.1192881,156 19.5,156 C20.8807119,156 22,157.119288 22,158.5 C22,159.880712 20.8807119,161 19.5,161 Z M70.5,161 C69.1192881,161 68,159.880712 68,158.5 C68,157.119288 69.1192881,156 70.5,156 C71.8807119,156 73,157.119288 73,158.5 C73,159.880712 71.8807119,161 70.5,161 Z M19.5,171 C18.1192881,171 17,169.880712 17,168.5 C17,167.119288 18.1192881,166 19.5,166 C20.8807119,166 22,167.119288 22,168.5 C22,169.880712 20.8807119,171 19.5,171 Z M70.5,171 C69.1192881,171 68,169.880712 68,168.5 C68,167.119288 69.1192881,166 70.5,166 C71.8807119,166 73,167.119288 73,168.5 C73,169.880712 71.8807119,171 70.5,171 Z" id="content-left-module-icon-color" fill="#D8D8D8"></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection