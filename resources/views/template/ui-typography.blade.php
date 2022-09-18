@extends('layouts.master')

@section('title') @lang('translation.Typography') @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') UI Elements @endslot
@slot('title') Typography @endslot
@endcomponent



<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0 ms-3 me-4">
                        <h1 class="display-4 mb-0">A</h1>
                    </div>
                    <div class="flex-grow-1 align-self-center">
                        <p class="text-muted mb-2">Font Family</p>
                        <h5 class="mb-0">"Poppins", sans-serif</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Headings</h4>
                <p class="card-title-desc">All HTML headings, <code>&lt;h1&gt;</code> through <code>&lt;h6&gt;</code>, are available.</p>

                <h1 class="mb-3">h1. Bootstrap heading <small class="text-muted">2.03125rem (32.5px)</small></h1>

                <h2 class="mb-3">h2. Bootstrap heading <small class="text-muted">1.625rem (26px)</small></h2>

                <h3 class="mb-3">h3. Bootstrap heading <small class="text-muted">1.42188rem (22.75px)</small></h3>

                <h4 class="mb-3">h4. Bootstrap heading <small class="text-muted">1.21875rem (19.5px)</small></h4>

                <h5 class="mb-3">h5. Bootstrap heading <small class="text-muted">1.01563rem (16.25)</small></h5>

                <h6>h6. Bootstrap heading <small class="text-muted">0.8125rem (13px)</small></h6>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-4">
                                <h1 class="fw-medium display-4 mb-0">Aa</h1>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-2">Font Weight</p>
                                <h4 class="mb-0">500</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center mt-4 mt-sm-0">
                            <div class="flex-shrink-0 me-4">
                                <h1 class="fw-semibold display-4 mb-0">Aa</h1>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-2">Font Weight</p>
                                <h4 class="mb-0">600</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->


    </div> <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Display headings</h4>
                <p class="card-title-desc">Traditional heading elements are designed to work best in the meat of your page content. </p>

                <h1 class="display-1">Display 1</h1>
                <h1 class="display-2">Display 2</h1>
                <h1 class="display-3">Display 3</h1>
                <h1 class="display-4">Display 4</h1>
                <h1 class="display-5">Display 5</h1>
                <h1 class="display-6 mb-0">Display 6</h1>

            </div>
        </div>



    </div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Inline text elements</h4>
                <p class="card-title-desc">Styling for common inline HTML5 elements.</p>

                <p class="lead">
                    Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
                </p>
                <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                <p><del>This line of text is meant to be treated as deleted text.</del></p>
                <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
                <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
                <p><u>This line of text will render as underlined</u></p>
                <p><small>This line of text is meant to be treated as fine print.</small></p>
                <p><strong>This line rendered as bold text.</strong></p>
                <p class="mb-0"><em>This line rendered as italicized text.</em></p>
            </div>
        </div>


    </div> <!-- end col -->

    <div class="col-xl-6">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Unstyled List</h4>
                <p class="card-title-desc">Remove the default <code class="highlighter-rouge">list-style</code> and left margin on list
                    items (immediate children only). <strong>This only applies to immediate
                        children list items</strong>, meaning you will need to add the class
                    for any nested lists as well.</p>

                <ul class="list-unstyled mb-0">
                    <li>Integer molestie lorem at massa</li>
                    <li>Nulla volutpat aliquam velit
                        <ul>
                            <li>Phasellus iaculis neque</li>
                            <li>Purus sodales ultricies</li>
                            <li>Vestibulum laoreet porttitor sem</li>
                        </ul>
                    </li>
                    <li>Faucibus porta lacus fringilla vel</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Inline List</h4>
                <p class="card-title-desc">Remove a list’s bullets and apply some
                    light <code class="highlighter-rouge">margin</code> with a combination
                    of two classes, <code class="highlighter-rouge">.list-inline</code> and
                    <code class="highlighter-rouge">.list-inline-item</code>.
                </p>

                <ul class="list-inline mb-0">
                    <li class="list-inline-item">Lorem ipsum</li>
                    <li class="list-inline-item">Phasellus iaculis</li>
                    <li class="list-inline-item">Nulla volutpat</li>
                </ul>

            </div>
        </div>

    </div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Blockquotes</h4>
                <p class="card-title-desc">For quoting blocks of content from
                    another source within your document. Wrap <code class="highlighter-rouge">&lt;blockquote
                        class="blockquote"&gt;</code> around any <abbr title="HyperText Markup Language">HTML</abbr> as the quote.</p>

                <div class="row">
                    <div class="col-xl-6">
                        <div>
                            <blockquote class="blockquote font-size-16 mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mt-4 mt-lg-0">
                            <blockquote class="blockquote  blockquote-reverse font-size-16 mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Description list alignment</h4>
                <p class="card-title-desc">Align terms and descriptions
                    horizontally by using our grid system’s predefined classes (or semantic
                    mixins). For longer terms, you can optionally add a <code class="highlighter-rouge">.text-truncate</code> class to
                    truncate the text with an ellipsis.</p>

                <dl class="row mb-0">
                    <dt class="col-sm-3">Description lists</dt>
                    <dd class="col-sm-9">A description list is perfect for defining terms.</dd>

                    <dt class="col-sm-3">Euismod</dt>
                    <dd class="col-sm-9">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                    <dd class="col-sm-9 offset-sm-3">Donec id elit non mi porta gravida at eget metus.</dd>

                    <dt class="col-sm-3">Malesuada porta</dt>
                    <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>

                    <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
                    <dd class="col-sm-9">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>

                    <dt class="col-sm-3">Nesting</dt>
                    <dd class="col-sm-9 mb-0">
                        <dl class="row mb-0">
                            <dt class="col-sm-4">Nested definition list</dt>
                            <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
                        </dl>
                    </dd>
                </dl>

            </div>
        </div>

    </div> <!-- end col -->
</div> <!-- end row -->

@endsection