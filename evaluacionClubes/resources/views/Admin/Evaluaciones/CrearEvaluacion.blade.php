@extends('Admin.Layout.Main')

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Basic Wizzard</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <p>
                    This is basic example of Step
                </p>
                <div id="wizard" role="application" class="wizard clearfix"><div class="steps clearfix"><ul role="tablist"><li role="tab" class="first current" aria-disabled="false" aria-selected="true"><a id="wizard-t-0" href="#wizard-h-0" aria-controls="wizard-p-0"><span class="current-info audible">current step: </span><span class="number">1.</span> First Step</a></li><li role="tab" class="done" aria-disabled="false" aria-selected="false"><a id="wizard-t-1" href="#wizard-h-1" aria-controls="wizard-p-1"><span class="number">2.</span> Second Step</a></li><li role="tab" class="disabled last" aria-disabled="true"><a id="wizard-t-2" href="#wizard-h-2" aria-controls="wizard-p-2"><span class="number">3.</span> Third Step</a></li></ul></div><div class="content clearfix">
                        <h1 id="wizard-h-0" tabindex="-1" class="title current">First Step</h1>
                        <div class="step-content body current" id="wizard-p-0" role="tabpanel" aria-labelledby="wizard-h-0" aria-hidden="false" style="display: block;">
                            <div class="text-center m-t-md">
                                <h2>Hello in Step 1</h2>
                                <p>
                                    This is the first content.
                                </p>
                            </div>
                        </div>

                        <h1 id="wizard-h-1" tabindex="-1" class="title">Second Step</h1>
                        <div class="step-content body" id="wizard-p-1" role="tabpanel" aria-labelledby="wizard-h-1" aria-hidden="true" style="display: none;">
                            <div class="text-center m-t-md">
                                <h2>This is step 2</h2>
                                <p>
                                    This content is diferent than the first one.
                                </p>
                            </div>
                        </div>

                        <h1 id="wizard-h-2" tabindex="-1" class="title">Third Step</h1>
                        <div class="step-content body" id="wizard-p-2" role="tabpanel" aria-labelledby="wizard-h-2" aria-hidden="true" style="display: none;">
                            <div class="text-center m-t-md">
                                <h2>This is step 3</h2>
                                <p>
                                    This is last content.
                                </p>
                            </div>
                        </div>
                    </div><div class="actions clearfix"><ul role="menu" aria-label="Pagination"><li class="disabled" aria-disabled="true"><a href="#previous" role="menuitem">Previous</a></li><li aria-hidden="false" aria-disabled="false"><a href="#next" role="menuitem">Next</a></li><li aria-hidden="false"><a href="#finish" role="menuitem">Finish</a></li><li><a href="#cancel" role="menuitem">Cancel</a></li></ul></div></div>

            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        $(document).ready(function() {
            $("#wizard").steps();
        });
    </script>

@endsection