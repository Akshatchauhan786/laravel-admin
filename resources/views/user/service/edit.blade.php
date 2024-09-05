@extends('user.layouts.master')
@section('title', 'Edit Services')
@section('user')
<div class="page-content">
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Service</div>
      <div class="ps-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Edit Services</li>
            </ol>
         </nav>
      </div>
   </div>
   <form method="POST" action="{{ url('user/update-service')}}/{{$data->id}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
         <div class="col-xl-9 mx-auto">
            <div class="card">
               <div class="card-body">
                  <div class="mb-3">
                     <label class="form-label">Your name </label>
                     <input type="text" name="your_name"  value="{{$data->your_name}}" class="form-control" placeholder="Your name">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Phone Number </label>
                     <input type="text" name="phone" value="{{$data->phone}}" class="form-control" placeholder="Phone Number">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Company Name </label>
                     <input type="text" name="company_name_1" value="{{$data->c_name}}" class="form-control" placeholder="Company Name ">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Company Phone Number </label>
                     <input type="text" name="company_phone_number" value="{{$data->company_address}}" class="form-control" placeholder="Company Phone Number">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Company Email </label>
                     <input type="text" name="company_email" value="{{$data->company_email}}" class="form-control" placeholder="Company Name ">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Company Address </label>
                     <input type="text" name="company_address" value="{{$data->company_address}}" class="form-control" placeholder="Company Address ">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Company office hours (example: 8 am to 5 pm)</label>
                     <input type="text" name="company_office_hours" value="{{$data->company_office_hours}}" class="form-control" placeholder="Company office hours ">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Company After Hours contact phone numbers</label>
                     <input type="text" name="contact_phone_numbers" value="{{$data->contact_phone_numbers}}" class="form-control" placeholder="Company After Hours contact phone numbers">
                  </div>
                  <select name="service" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="selectDropdown" onchange="toggleHiddenBlock()">
                     <option value="">Select Service</option>
                     <option value="Business Registration/FEIN/Foreign Corporation Filing" {{$data->service == 'Business Registration/FEIN/Foreign Corporation Filing' ? 'selected' : '' }}>Business Registration/FEIN/Foreign Corporation Filing</option>
                     <option value="Health care business Licensing" {{$data->service == 'Health care business Licensing' ? 'selected' : '' }}>Health care business Licensing</option>
                     <option value="Policies and Procedures" {{$data->service == 'Policies and Procedures' ? 'selected' : '' }}>Policies and Procedures</option>
                     <option value="Accreditation" {{$data->service == 'Accreditation' ? 'selected' : '' }}>Accreditation</option>
                     <option value="Credentialing" {{$data->service == 'Credentialing' ? 'selected' : '' }}>Credentialing</option>
                     <option value="Website Development and Logo" {{$data->service == 'Website Development and Logo' ? 'selected' : '' }}>Website Development and Logo</option>
                     <option value="Consulting" {{$data->service == 'Consulting' ? 'selected' : '' }}>Consulting</option>
                     <option value="Other" {{$data->service == 'Other' ? 'selected' : '' }}>Other</option>
                  </select>
               </div>
            </div>
            <div id="hiddenBlock">
               <h6 class="mb-0 text-uppercase">Business Registration</h6>
               <hr>
               <div class="card">
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Company Name </label>
                        <input type="text" name="company_name" value="{{$data->company_name}}" class="form-control"  placeholder="Company Name ">
                     </div>
                     <label class="form-label">Type of registration</label>
                     <select class="form-select mb-3" name="type_of_registration" id="registrationType" aria-label="Default select example" onchange="registration()">
                        <option value="">Type of registration</option>
                        <option value="Partnerships" {{$data->type_of_registration == 'Partnerships' ? 'selected' : '' }}>Partnerships</option>
                        <option value="Limited liability company (LLC)" {{$data->type_of_registration == 'Limited liability company (LLC)' ? 'selected' : '' }}>Limited liability company (LLC)</option>
                        <option value="Corporation - C corp" {{$data->type_of_registration == 'Corporation - C corp' ? 'selected' : '' }}>Corporation - C corp</option>
                        <option value="Corporation - S corp" {{$data->type_of_registration == 'Corporation - S corp' ? 'selected' : '' }}>Corporation - S corp</option>
                        <option value="Corporation - B corp" {{$data->type_of_registration == 'Corporation - B corp' ? 'selected' : '' }}>Corporation - B corp</option>
                        <option value="Corporation - Nonprofit" {{$data->type_of_registration == 'Corporation - Nonprofit' ? 'selected' : '' }}>Corporation - Nonprofit</option>
                     </select>
                     <div id="hiddenregistrationType">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Two or more people</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Unlimited personal liability unless structured as a limited partnership</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Self-employment tax (except for limited partners)
                                       Personal tax
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="hiddenregistrationType1">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">One or more people</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Owners are not personally liable</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Self-employment tax
                                       Personal tax or corporate tax
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="hiddenregistrationType2">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">One or more people</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Owners are not personally liable</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Corporate tax
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="hiddenregistrationType3">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">One or more people, but no more than 100, and all must be U.S. citizens</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Owners are not personally liable</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">SPersonal tax
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="hiddenregistrationType4">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">One or more people</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Owners are not personally liable</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Corporate tax
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="hiddenregistrationType5">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">One or more people</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Owners are not personally liable</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="card text-center">
                                 <div class="card-body">
                                    <div class="text-secondary rounded">Tax-exempt, but corporate profits can't be distributed</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <label class="form-label">State</label>
                     <select class="form-select mb-3"  name="state" aria-label="Default select example" onchange="registration()">
                        <option value="">Select State</option>
                        <option value="Alabama" {{$data->state == 'Alabama' ? 'selected' : '' }}>Alabama</option>
                        <option value="Alaska" {{$data->state == 'Alaska' ? 'selected' : '' }}>Alaska</option>
                        <option value="Arizona" {{$data->state == 'Arizona' ? 'selected' : '' }}>Arizona</option>
                        <option value="Arkansas" {{$data->state == 'Arkansas' ? 'selected' : '' }}>Arkansas</option>
                        <option value="California" {{$data->state == 'California' ? 'selected' : '' }}>California</option>
                        <option value="Colorado" {{$data->state == 'Colorado' ? 'selected' : '' }}>Colorado</option>
                        <option value="Connecticut" {{$data->state == 'Connecticut' ? 'selected' : '' }}>Connecticut</option>
                        <option value="Delaware" {{$data->state == 'Delaware' ? 'selected' : '' }}>Delaware</option>
                        <option value="Florida" {{$data->state == 'Florida' ? 'selected' : '' }}>Florida</option>
                        <option value="Georgia" {{$data->state == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                        <option value="Hawaii" {{$data->state == 'Hawaii' ? 'selected' : '' }}>Hawaii</option>
                        <option value="Idaho" {{$data->state == 'Idaho' ? 'selected' : '' }}>Idaho</option>
                        <option value="Illinois" {{$data->state == 'Illinois' ? 'selected' : '' }}>Illinois</option>
                        <option value="Indiana" {{$data->state == 'Indiana' ? 'selected' : '' }}>Indiana</option>
                        <option value="Iowa" {{$data->state == 'Iowa' ? 'selected' : '' }}>Iowa</option>
                        <option value="Kansas" {{$data->state == 'Kansas' ? 'selected' : '' }}>Kansas</option>
                        <option value="Kentucky" {{$data->state == 'Kentucky' ? 'selected' : '' }}>Kentucky</option>
                        <option value="Louisiana" {{$data->state == 'Louisiana' ? 'selected' : '' }}>Louisiana</option>
                        <option value="Maine" {{$data->state == 'Maine' ? 'selected' : '' }}>Maine</option>
                        <option value="Maryland" {{$data->state == 'Maryland' ? 'selected' : '' }}>Maryland</option>
                        <option value="Massachusetts" {{$data->state == 'Massachusetts' ? 'selected' : '' }}>Massachusetts</option>
                        <option value="Michigan" {{$data->state == 'Michigan' ? 'selected' : '' }}>Michigan</option>
                        <option value="Minnesota" {{$data->state == 'Minnesota' ? 'selected' : '' }}>Minnesota</option>
                        <option value="Mississippi" {{$data->state == 'Mississippi' ? 'selected' : '' }}>Mississippi</option>
                        <option value="Missouri" {{$data->state == 'Missouri' ? 'selected' : '' }}>Missouri</option>
                        <option value="Montana" {{$data->state == 'Montana' ? 'selected' : '' }}>Montana</option>
                        <option value="Nebraska" {{$data->state == 'Nebraska' ? 'selected' : '' }}>Nebraska</option>
                        <option value="Nevada" {{$data->state == 'Nevada' ? 'selected' : '' }}>Nevada</option>
                        <option value="New Hampshire" {{$data->state == 'New Hampshire' ? 'selected' : '' }}>New Hampshire</option>
                        <option value="New Jersey" {{$data->state == 'New Jersey' ? 'selected' : '' }}>New Jersey</option>
                        <option value="New Mexico" {{$data->state == 'New Mexico' ? 'selected' : '' }}>New Mexico</option>
                        <option value="New York" {{$data->state == 'New York' ? 'selected' : '' }}>New York</option>
                        <option value="North Carolina" {{$data->state == 'North Carolina' ? 'selected' : '' }}>North Carolina</option>
                        <option value="North Dakota" {{$data->state == 'North Dakota' ? 'selected' : '' }}>North Dakota</option>
                        <option value="Ohio" {{$data->state == 'Ohio' ? 'selected' : '' }}>Ohio</option>
                        <option value="Oklahoma" {{$data->state == 'Oklahoma' ? 'selected' : '' }}>Oklahoma</option>
                        <option value="Oregon" {{$data->state == 'Oregon' ? 'selected' : '' }}>Oregon</option>
                        <option value="Pennsylvania" {{$data->state == 'Pennsylvania' ? 'selected' : '' }}>Pennsylvania</option>
                        <option value="Rhode Island" {{$data->state == 'Rhode Island' ? 'selected' : '' }}>Rhode Island</option>
                        <option value="South Carolina" {{$data->state == 'South Carolina' ? 'selected' : '' }}>South Carolina</option>
                        <option value="South Dakota" {{$data->state == 'South Dakota' ? 'selected' : '' }}>South Dakota</option>
                        <option value="Tennessee" {{$data->state == 'Tennessee' ? 'selected' : '' }}>Tennessee</option>
                        <option value="Texas" {{$data->state == 'Texas' ? 'selected' : '' }}>Texas</option>
                        <option value="Utah" {{$data->state == 'Utah' ? 'selected' : '' }}>Utah</option>
                        <option value="Vermont" {{$data->state == 'Vermont' ? 'selected' : '' }}>Vermont</option>
                        <option value="Virginia" {{$data->state == 'Virginia' ? 'selected' : '' }}>Virginia</option>
                        <option value="Washington" {{$data->state == 'Washington' ? 'selected' : '' }}>Washington</option>
                        <option value="West Virginia" {{$data->state == 'West Virginia' ? 'selected' : '' }}>West Virginia</option>
                        <option value="Wisconsin" {{$data->state == 'Wisconsin' ? 'selected' : '' }}>Wisconsin</option>
                        <option value="Wyoming" {{$data->state == 'Wyoming' ? 'selected' : '' }}>Wyoming</option>
                     </select>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Owner(s) name(s)</label>
                        <textarea class="form-control"  name="owners_name"  placeholder="Owner(s) name(s)" rows="3">{{$data->owners_name}}</textarea>
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Percentage of ownership</label>
                        <textarea class="form-control" name="percentage_of_ownership" placeholder="Percentage of ownership" rows="3">{{$data->percentage_of_ownership}}</textarea>
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Address</label>
                        <textarea class="form-control" id="inputAddress" name="address" placeholder="Address..." rows="3">{{$data->address}}</textarea>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Phone Number </label>
                        <input type="text" name="phone_number" value="{{$data->phone_number}}" class="form-control" placeholder="Phone Number">
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">File EIN</label>
                        <input class="form-control" type="file" id="File EIN" name ="file_ein">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->file_ein}}" download>{{$data->file_ein}}</a></p>
                     </div>
                  </div>
               </div>
            </div>
            <div id="hiddenBlock1">
               <h6 class="mb-0 text-uppercase">Health care business Licensing</h6>
               <hr>
               <div class="card">
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Select Healthcare Business Types</label>
                        <select class=" form-select mb-3 multiple-select select2-hidden-accessible" name="healthcare_business_types1[]" data-placeholder="Choose anything" multiple="" data-select2-id="123" tabindex="-1" aria-hidden="true">
                        @php
                        $healthcareBusinessTypes = is_array(json_decode($item->healthcare_business_types)) ? json_decode($item->healthcare_business_types) : [];
                        @endphp
                        <option value="Adult Day Care" {{ in_array('Adult Day Care', $healthcareBusinessTypes) ? 'selected' : '' }}>Adult Day Care</option>
                        <option value="Assisted Living" {{ in_array('Assisted Living', $healthcareBusinessTypes) ? 'selected' : '' }}>Assisted Living</option>
                        <option value="Continued Care Retirement Communities" {{ in_array('Continued Care Retirement Communities', $healthcareBusinessTypes) ? 'selected' : '' }}>Continued Care Retirement Communities</option>
                        <option value="Durable and Home Medical Equipment companies" {{ in_array('Durable and Home Medical Equipment companies', $healthcareBusinessTypes) ? 'selected' : '' }}>Durable and Home Medical Equipment companies</option>
                        <option value="Group Home businesses" {{ in_array('Group Home businesses', $healthcareBusinessTypes) ? 'selected' : '' }}>Group Home businesses</option>
                        <option value="Home Care and Home Health Care Agencies" {{ in_array('Home Care and Home Health Care Agencies', $healthcareBusinessTypes) ? 'selected' : '' }}>Home Care and Home Health Care Agencies</option>
                        <option value="Hospice and Palliative Care" {{ in_array('Hospice and Palliative Care', $healthcareBusinessTypes) ? 'selected' : '' }}>Hospice and Palliative Care</option>
                        <option value="Medical Courier Service Business" {{ in_array('Medical Courier Service Business', $healthcareBusinessTypes) ? 'selected' : '' }}>Medical Courier Service Business</option>
                        <option value="Health Care Staffing Agencies" {{ in_array('Health Care Staffing Agencies', $healthcareBusinessTypes) ? 'selected' : '' }}>Health Care Staffing Agencies</option>
                        <option value="Non-Emergency Medical Transportation (NEMT) business" {{ in_array('Non-Emergency Medical Transportation (NEMT) business', $healthcareBusinessTypes) ? 'selected' : '' }}>Non-Emergency Medical Transportation (NEMT) business</option>
                        <option value="Opioid Treatment Programs" {{ in_array('Opioid Treatment Programs', $healthcareBusinessTypes) ? 'selected' : '' }}>Opioid Treatment Programs</option>
                        <option value="Sleep Lab Clinics" {{ in_array('Sleep Lab Clinics', $healthcareBusinessTypes) ? 'selected' : '' }}>Sleep Lab Clinics</option>
                        <option value="Specialized Community Based Children Health Care Services" {{ in_array('Specialized Community Based Children Health Care Services', $healthcareBusinessTypes) ? 'selected' : '' }}>Specialized Community Based Children Health Care Services</option>
                        <option value="Therapy and Rehabilitation Service Providers" {{ in_array('Therapy and Rehabilitation Service Providers', $healthcareBusinessTypes) ? 'selected' : '' }}>Therapy and Rehabilitation Service Providers</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress"  class="form-label">Explain the services to be provided</label>
                        <textarea class="form-control" name="explain_the_services" placeholder="Explain the services to be provided" rows="3">{{$data->explain_the_services}}</textarea>
                     </div>
                     <label class="form-label">State</label>
                     <select class="form-select mb-3"  name="state" aria-label="Default select example" onchange="registration()">
                        <option value="">Select State</option>
                        <option value="Alabama" {{$data->state == 'Alabama' ? 'selected' : '' }}>Alabama</option>
                        <option value="Alaska" {{$data->state == 'Alaska' ? 'selected' : '' }}>Alaska</option>
                        <option value="Arizona" {{$data->state == 'Arizona' ? 'selected' : '' }}>Arizona</option>
                        <option value="Arkansas" {{$data->state == 'Arkansas' ? 'selected' : '' }}>Arkansas</option>
                        <option value="California" {{$data->state == 'California' ? 'selected' : '' }}>California</option>
                        <option value="Colorado" {{$data->state == 'Colorado' ? 'selected' : '' }}>Colorado</option>
                        <option value="Connecticut" {{$data->state == 'Connecticut' ? 'selected' : '' }}>Connecticut</option>
                        <option value="Delaware" {{$data->state == 'Delaware' ? 'selected' : '' }}>Delaware</option>
                        <option value="Florida" {{$data->state == 'Florida' ? 'selected' : '' }}>Florida</option>
                        <option value="Georgia" {{$data->state == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                        <option value="Hawaii" {{$data->state == 'Hawaii' ? 'selected' : '' }}>Hawaii</option>
                        <option value="Idaho" {{$data->state == 'Idaho' ? 'selected' : '' }}>Idaho</option>
                        <option value="Illinois" {{$data->state == 'Illinois' ? 'selected' : '' }}>Illinois</option>
                        <option value="Indiana" {{$data->state == 'Indiana' ? 'selected' : '' }}>Indiana</option>
                        <option value="Iowa" {{$data->state == 'Iowa' ? 'selected' : '' }}>Iowa</option>
                        <option value="Kansas" {{$data->state == 'Kansas' ? 'selected' : '' }}>Kansas</option>
                        <option value="Kentucky" {{$data->state == 'Kentucky' ? 'selected' : '' }}>Kentucky</option>
                        <option value="Louisiana" {{$data->state == 'Louisiana' ? 'selected' : '' }}>Louisiana</option>
                        <option value="Maine" {{$data->state == 'Maine' ? 'selected' : '' }}>Maine</option>
                        <option value="Maryland" {{$data->state == 'Maryland' ? 'selected' : '' }}>Maryland</option>
                        <option value="Massachusetts" {{$data->state == 'Massachusetts' ? 'selected' : '' }}>Massachusetts</option>
                        <option value="Michigan" {{$data->state == 'Michigan' ? 'selected' : '' }}>Michigan</option>
                        <option value="Minnesota" {{$data->state == 'Minnesota' ? 'selected' : '' }}>Minnesota</option>
                        <option value="Mississippi" {{$data->state == 'Mississippi' ? 'selected' : '' }}>Mississippi</option>
                        <option value="Missouri" {{$data->state == 'Missouri' ? 'selected' : '' }}>Missouri</option>
                        <option value="Montana" {{$data->state == 'Montana' ? 'selected' : '' }}>Montana</option>
                        <option value="Nebraska" {{$data->state == 'Nebraska' ? 'selected' : '' }}>Nebraska</option>
                        <option value="Nevada" {{$data->state == 'Nevada' ? 'selected' : '' }}>Nevada</option>
                        <option value="New Hampshire" {{$data->state == 'New Hampshire' ? 'selected' : '' }}>New Hampshire</option>
                        <option value="New Jersey" {{$data->state == 'New Jersey' ? 'selected' : '' }}>New Jersey</option>
                        <option value="New Mexico" {{$data->state == 'New Mexico' ? 'selected' : '' }}>New Mexico</option>
                        <option value="New York" {{$data->state == 'New York' ? 'selected' : '' }}>New York</option>
                        <option value="North Carolina" {{$data->state == 'North Carolina' ? 'selected' : '' }}>North Carolina</option>
                        <option value="North Dakota" {{$data->state == 'North Dakota' ? 'selected' : '' }}>North Dakota</option>
                        <option value="Ohio" {{$data->state == 'Ohio' ? 'selected' : '' }}>Ohio</option>
                        <option value="Oklahoma" {{$data->state == 'Oklahoma' ? 'selected' : '' }}>Oklahoma</option>
                        <option value="Oregon" {{$data->state == 'Oregon' ? 'selected' : '' }}>Oregon</option>
                        <option value="Pennsylvania" {{$data->state == 'Pennsylvania' ? 'selected' : '' }}>Pennsylvania</option>
                        <option value="Rhode Island" {{$data->state == 'Rhode Island' ? 'selected' : '' }}>Rhode Island</option>
                        <option value="South Carolina" {{$data->state == 'South Carolina' ? 'selected' : '' }}>South Carolina</option>
                        <option value="South Dakota" {{$data->state == 'South Dakota' ? 'selected' : '' }}>South Dakota</option>
                        <option value="Tennessee" {{$data->state == 'Tennessee' ? 'selected' : '' }}>Tennessee</option>
                        <option value="Texas" {{$data->state == 'Texas' ? 'selected' : '' }}>Texas</option>
                        <option value="Utah" {{$data->state == 'Utah' ? 'selected' : '' }}>Utah</option>
                        <option value="Vermont" {{$data->state == 'Vermont' ? 'selected' : '' }}>Vermont</option>
                        <option value="Virginia" {{$data->state == 'Virginia' ? 'selected' : '' }}>Virginia</option>
                        <option value="Washington" {{$data->state == 'Washington' ? 'selected' : '' }}>Washington</option>
                        <option value="West Virginia" {{$data->state == 'West Virginia' ? 'selected' : '' }}>West Virginia</option>
                        <option value="Wisconsin" {{$data->state == 'Wisconsin' ? 'selected' : '' }}>Wisconsin</option>
                        <option value="Wyoming" {{$data->state == 'Wyoming' ? 'selected' : '' }}>Wyoming</option>
                     </select>
                     <div class="mb-3">
                        <label for="inputAddress" name="" class="form-label">Counties where services will be provided</label>
                        <textarea class="form-control" name="counties_where" placeholder="Counties where services will be provided" rows="3">{{$data->counties_where}}</textarea>
                     </div>
                  </div>
               </div>
            </div>
            <div id="hiddenBlock2">
               <h6 class="mb-0 text-uppercase">Policies and Procedures</h6>
               <hr>
               <div class="card">
                  <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Select Healthcare Business Types</label>
                        <select class=" form-select mb-3 multiple-select select2-hidden-accessible" name="healthcare_business_types[]" data-placeholder="Choose anything" multiple="" data-select2-id="12" tabindex="-1" aria-hidden="true">
                        @php
                        $healthcareBusinessTypes = is_array(json_decode($item->healthcare_business_types)) ? json_decode($item->healthcare_business_types) : [];
                        @endphp
                        <option value="Adult Day Care" {{ in_array('Adult Day Care', $healthcareBusinessTypes) ? 'selected' : '' }}>Adult Day Care</option>
                        <option value="Assisted Living" {{ in_array('Assisted Living', $healthcareBusinessTypes) ? 'selected' : '' }}>Assisted Living</option>
                        <option value="Continued Care Retirement Communities" {{ in_array('Continued Care Retirement Communities', $healthcareBusinessTypes) ? 'selected' : '' }}>Continued Care Retirement Communities</option>
                        <option value="Durable and Home Medical Equipment companies" {{ in_array('Durable and Home Medical Equipment companies', $healthcareBusinessTypes) ? 'selected' : '' }}>Durable and Home Medical Equipment companies</option>
                        <option value="Group Home businesses" {{ in_array('Group Home businesses', $healthcareBusinessTypes) ? 'selected' : '' }}>Group Home businesses</option>
                        <option value="Home Care and Home Health Care Agencies" {{ in_array('Home Care and Home Health Care Agencies', $healthcareBusinessTypes) ? 'selected' : '' }}>Home Care and Home Health Care Agencies</option>
                        <option value="Hospice and Palliative Care" {{ in_array('Hospice and Palliative Care', $healthcareBusinessTypes) ? 'selected' : '' }}>Hospice and Palliative Care</option>
                        <option value="Medical Courier Service Business" {{ in_array('Medical Courier Service Business', $healthcareBusinessTypes) ? 'selected' : '' }}>Medical Courier Service Business</option>
                        <option value="Health Care Staffing Agencies" {{ in_array('Health Care Staffing Agencies', $healthcareBusinessTypes) ? 'selected' : '' }}>Health Care Staffing Agencies</option>
                        <option value="Non-Emergency Medical Transportation (NEMT) business" {{ in_array('Non-Emergency Medical Transportation (NEMT) business', $healthcareBusinessTypes) ? 'selected' : '' }}>Non-Emergency Medical Transportation (NEMT) business</option>
                        <option value="Opioid Treatment Programs" {{ in_array('Opioid Treatment Programs', $healthcareBusinessTypes) ? 'selected' : '' }}>Opioid Treatment Programs</option>
                        <option value="Sleep Lab Clinics" {{ in_array('Sleep Lab Clinics', $healthcareBusinessTypes) ? 'selected' : '' }}>Sleep Lab Clinics</option>
                        <option value="Specialized Community Based Children Health Care Services" {{ in_array('Specialized Community Based Children Health Care Services', $healthcareBusinessTypes) ? 'selected' : '' }}>Specialized Community Based Children Health Care Services</option>
                        <option value="Therapy and Rehabilitation Service Providers" {{ in_array('Therapy and Rehabilitation Service Providers', $healthcareBusinessTypes) ? 'selected' : '' }}>Therapy and Rehabilitation Service Providers</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Company mission, vision, and goals.</label>
                        <textarea class="form-control" name="company_mission_vision_and_goals" placeholder="Company mission, vision, and goals." rows="3">{{$data->company_mission_vision_and_goals}}</textarea>
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Name of the Director and other key management staff. State Rules and regulations the policies and procedures should meet</label>
                        <textarea class="form-control" name="name_of_the_director" placeholder="Name of the Director and other key management staff. State Rules and regulations the policies and procedures should meet" rows="3">{{$data->name_of_the_director}}</textarea>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Upload company logo</label>
                        <input class="form-control" type="file" name="upload_company_logo" >
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->upload_company_logo}}" download>{{$data->upload_company_logo}}</a></p>
                     </div>
                  </div>
               </div>
            </div>
            <div id="hiddenBlock3">
               <h6 class="mb-0 text-uppercase">Accreditation</h6>
               <hr>
               <div class="card">
                  <div class="card-body">
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Completion and submission of accreditation forms</label>
                        <textarea class="form-control" name="completion_and_submission" placeholder="Completion and submission of accreditation forms" rows="3">{{$data->completion_and_submission}}</textarea>
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Completion of accreditation policies and procedures</label>
                        <textarea class="form-control" name="completion_of_accreditation" placeholder="Completion of accreditation policies and procedures" rows="3">{{$data->completion_of_accreditation}}</textarea>
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Mock Survey</label>
                        <textarea class="form-control" name="mock_survey" placeholder="Mock Survey" rows="3">{{$data->mock_survey}}</textarea>
                     </div>
                  </div>
               </div>
            </div>
            <div id="hiddenBlock4">
               <h6 class="mb-0 text-uppercase">Credentialing</h6>
               <hr>
               <div class="card">
                  <div class="card-body">
                     <h6 class="mb-0 text-uppercase">Office Information </h6>
                     <hr>
                     <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="office_address" value="{{$data->office_address}}" placeholder="Address">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Phone </label>
                        <input type="text" class="form-control" name="office_phone" value="{{$data->office_phone}}" placeholder="Phone ">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Fax Number</label>
                        <input type="text" class="form-control" name="office_fax_number" value="{{$data->office_fax_number}}" placeholder="Fax Number">
                     </div>
                     <h6 class="mb-0 text-uppercase">Corporate Information</h6>
                     <hr>
                     <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="corporate_address" value="{{$data->corporate_address}}" placeholder="Address">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Phone </label>
                        <input type="text" class="form-control" name="corporate_phone" value="{{$data->corporate_phone}}" placeholder="Phone ">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Fax Number</label>
                        <input type="text" class="form-control"  name="corporate_fax_number" value="{{$data->corporate_fax_number}}" placeholder="Fax Number">
                     </div>
                     <h6 class="mb-0 text-uppercase">Business Corporation</h6>
                     <hr>
                     <div class="mb-3">
                        <label class="form-label">Business Corporation Name </label>
                        <input type="text" class="form-control" name="business_corporation_name" value="{{$data->business_corporation_name}}" placeholder="Business Corporation Name">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Type of Business</label>
                        <input type="text" class="form-control" name="type_of_business" value="{{$data->type_of_business}}" placeholder="Type of Business">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Doing Business as Name</label>
                        <input type="text" class="form-control" name="doing_business_as_name" value="{{$data->doing_business_as_name}}" placeholder="Doing Business as Name">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">NPI (Organizational NPI)</label>
                        <input type="text" class="form-control" name="organizational_npi" value="{{$data->organizational_npi}}" placeholder="NPI (Organizational NPI)">
                     </div>
                     <h6 class="mb-0 text-uppercase">UPLOAD THE FOLLOWING</h6>
                     <hr>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Business License (City, County and State) </label>
                        <input class="form-control" type="file" name="business_license"  placeholder="Business License (City, County and State)">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->business_license}}" download>{{$data->business_license}}</a></p>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">W-9</label>
                        <input class="form-control" type="file"  name="w_9" >
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->w_9}}" download>{{$data->w_9}}</a></p>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">IRS Business Acceptance Letter</label>
                        <input class="form-control" type="file" id="Upload company logo" name="irs_business">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->irs_business}}" download>{{$data->irs_business}}</a></p>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Business Insurance Binder/Declaration Pages</label>
                        <input class="form-control" type="file" id="Upload company logo" name="business_insurance">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->business_insurance}}" download>{{$data->business_insurance}}</a></p>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Disclosure of Ownership</label>
                        <input class="form-control" type="file" id="Upload company logo" name="disclosure_of_ownership">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->disclosure_of_ownership}}" download>{{$data->disclosure_of_ownership}}</a></p>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Managing Partners Names and Social Security Numbers All</label>
                        <input class="form-control" type="file" id="Upload company logo" name="managing_partners">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->managing_partners}}" download>{{$data->managing_partners}}</a></p>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">State Licensures</label>
                        <input class="form-control" type="file" id="Upload company logo" name="state_licensures">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->state_licensures}}" download>{{$data->state_licensures}}</a></p>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">CLIA Licensures</label>
                        <input class="form-control" type="file" id="Upload company logo" name="clia_licensures">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->clia_licensures}}" download>{{$data->clia_licensures}}</a></p>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Facility Roster</label>
                        <input class="form-control" type="file" id="Upload company logo" name="facility_roster">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->facility_roster}}" download>{{$data->facility_roster}}</a></p>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Any specialized Licensures Specific to Specialty Voided Check (If Using EFT Setup Services)</label>
                        <input class="form-control" type="file" id="Upload company logo" name="any_specialized">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->any_specialized}}" download>{{$data->any_specialized}}</a></p>
                     </div>
                     <h6 class="mb-0 text-uppercase">ADDITIONAL ITEMS NEEDED </h6>
                     <hr>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">NPPES Login (If available)</label>
                        <textarea class="form-control"   name="nppes_login" placeholder="NPPES Login (If available)" rows="3">{{$data->nppes_login}}</textarea>
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">PECOS Login</label>
                        <textarea class="form-control" name="pecos_login" id="PECOS Login" name="pecos_login" placeholder="PECOS Login" rows="3">{{$data->pecos_login}}</textarea>
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">CAQH Login</label>
                        <textarea class="form-control" id="CAQHLogin" name="caqh_login" placeholder="CAQH Login" rows="3">{{$data->caqh_login}}</textarea>
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Medicaid Number (If available)</label>
                        <textarea class="form-control" id="MedicaidNumber" name="medicaid_number" placeholder="Completion and submission of accreditation forms" rows="3">{{$data->medicaid_number}}</textarea>
                     </div>
                  </div>
               </div>
            </div>
            <div id="hiddenBlock5">
               <h6 class="mb-0 text-uppercase">Website Development and Logo</h6>
               <hr>
               <div class="card">
                  <div class="card-body">
                     <h6 class="mb-0 text-uppercase">Website name and hosting</h6>
                     <hr>
                     <div class="mb-3">
                        <label class="form-label">Website address (url)</label>
                        <input type="text" class="form-control" name="website_address" value="{{$data->website_address}}" placeholder="Website address (url)">
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Hosting Provider  </label>
                        <input type="text" class="form-control" name="hosting_provider" value="{{$data->hosting_provider}}" placeholder="Hosting Provider">
                     </div>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Hosting login information (user name and password)</label>
                        <textarea class="form-control"  name="hosting_login"  placeholder="Hosting login information (user name and password)" rows="3">{{$data->hosting_login}}</textarea>
                     </div>
                     <h6 class="mb-0 text-uppercase">Name of the company as it should appear on the website:</h6>
                     <hr>
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Preferred colors for the website: - background color: - headings color: - text color:</label>
                        <textarea class="form-control"  name="preferred_colors" placeholder="Preferred colors for the website: - background color: - headings color: - text color:" rows="3">{{$data->preferred_colors}}</textarea>
                     </div>
                     <select class="form-select mb-3" id="logoOption" name="do_you_need_a_logo_design" aria-label="Default select example" onchange="toggleUploadSection()">
                        <option value="">Do you need a logo design with the website?</option>
                        <option value="Yes" {{$data->do_you_need_a_logo_design == 'Yes' ? 'selected' : '' }}>Yes</option>
                        <option value="No" {{$data->do_you_need_a_logo_design == 'No' ? 'selected' : '' }}>No</option>
                     </select>
                     <div class="mb-3" id="uploadSection" style="display: none;">
                        <label for="formFileMultiple" class="form-label">Upload Logo</label>
                        <input class="form-control" type="file" name="upload_logo" id="uploadLogo">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->upload_logo}}" download>{{$data->upload_logo}}</a></p>
                     </div>
                     <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Upload File</label>
                        <input class="form-control" type="file" name="uploade_file" id="Upload company logo">
                        <p class="m-3"><a href="{{asset('media')}}/{{$data->uploade_file}}" download>{{$data->uploade_file}}</a></p>
                     </div>
                  </div>
               </div>
            </div>
            <div id="hiddenBlock6">
               <h6 class="mb-0 text-uppercase">Consulting</h6>
               <hr>
               <div class="card">
                  <div class="card-body">
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Message</label>
                        <textarea class="form-control"  name="consulting" placeholder="Message" rows="3">{{$data->consulting}}</textarea>
                     </div>
                  </div>
               </div>
            </div>
            <div id="hiddenBlock7">
               <h6 class="mb-0 text-uppercase">Other</h6>
               <hr>
               <div class="card">
                  <div class="card-body">
                     <div class="mb-3">
                        <label for="inputAddress" class="form-label">Message</label>
                        <textarea class="form-control"  name="other" placeholder="Message" rows="3">{{$data->other}}</textarea>
                     </div>
                  </div>
               </div>
            </div>
            <input type="submit" class="btn btn-primary px-4"  style="text-align: right;" value="Update">
         </div>
      </div>
   </form>
</div>
<script>window.onload = function() {
   toggleHiddenBlock();
   toggleUploadSection()
   };
</script>
<style>
   /* Hide the block by default */
   #hiddenBlock {
   display: none;
   }
   #hiddenBlock1 {
   display: none;
   }
   #hiddenBlock2 {
   display: none;
   }
   #hiddenBlock3 {
   display: none;
   }
   #hiddenBlock4 {
   display: none;
   }
   #hiddenBlock5 {
   display: none;
   }
   #hiddenBlock6 {
   display: none;
   }
   #hiddenBlock7 {
   display: none;
   }
   #hiddenregistrationType {
   display: none;
   }
   #hiddenregistrationType1 {
   display: none;
   }
   #hiddenregistrationType2 {
   display: none;
   }
   #hiddenregistrationType3 {
   display: none;
   }
   #hiddenregistrationType4 {
   display: none;
   }
   #hiddenregistrationType5 {
   display: none;
   }
</style>
<script>
   function toggleHiddenBlock() {
       // Get the selected value from the dropdown
       var selectedValue = document.getElementById("selectDropdown").value;
   
       // Get the hidden block element
       var hiddenBlock = document.getElementById("hiddenBlock");
       var hiddenBlock1 = document.getElementById("hiddenBlock1");
       var hiddenBlock2 = document.getElementById("hiddenBlock2");
       var hiddenBlock3 = document.getElementById("hiddenBlock3");
       var hiddenBlock4 = document.getElementById("hiddenBlock4");
       var hiddenBlock5 = document.getElementById("hiddenBlock5");
       var hiddenBlock6 = document.getElementById("hiddenBlock6");
       var hiddenBlock7 = document.getElementById("hiddenBlock7");
   
       // Toggle the visibility of the block based on the selected value
       if (selectedValue === "Business Registration/FEIN/Foreign Corporation Filing") {
           hiddenBlock.style.display = "block";
       } else {
           hiddenBlock.style.display = "none";
       }
    if (selectedValue === "Health care business Licensing") {
           hiddenBlock1.style.display = "block";
       } else {
           hiddenBlock1.style.display = "none";
       }
    if (selectedValue === "Policies and Procedures") {
           hiddenBlock2.style.display = "block";
       } else {
           hiddenBlock2.style.display = "none";
       }
    if (selectedValue === "Accreditation") {
           hiddenBlock3.style.display = "block";
       } else {
           hiddenBlock3.style.display = "none";
       }
   
       if (selectedValue === "Credentialing") {
           hiddenBlock4.style.display = "block";
       } else {
           hiddenBlock4.style.display = "none";
       }
       if (selectedValue === "Website Development and Logo") {
           hiddenBlock5.style.display = "block";
       } else {
           hiddenBlock5.style.display = "none";
       }
       if (selectedValue === "Consulting") {
           hiddenBlock6.style.display = "block";
       } else {
           hiddenBlock6.style.display = "none";
       }
       if (selectedValue === "Other") {
           hiddenBlock7.style.display = "block";
       } else {
           hiddenBlock7.style.display = "none";
       }
   }
   
   function registration() {
       // Get the selected value from the dropdown
       var selectedValue = document.getElementById("registrationType").value;
   
       // Get the hidden block element
       var hiddenBlock = document.getElementById("hiddenregistrationType");
       var hiddenBlock1 = document.getElementById("hiddenregistrationType1");
       var hiddenBlock2 = document.getElementById("hiddenregistrationType2");
       var hiddenBlock3 = document.getElementById("hiddenregistrationType3");
       var hiddenBlock4 = document.getElementById("hiddenregistrationType4");
       var hiddenBlock5 = document.getElementById("hiddenregistrationType5");
   
       // Toggle the visibility of the block based on the selected value
       if (selectedValue == "Partnerships") {
           hiddenBlock.style.display = "block";
       }  else {
           hiddenBlock.style.display = "none";
          
       }
    if(selectedValue == "Limited liability company (LLC)"){
           hiddenBlock1.style.display = "block";
       } else {
          
           hiddenBlock1.style.display = "none";
       }
    if(selectedValue == "Corporation - C corp"){
           hiddenBlock2.style.display = "block";
       } else {
          
           hiddenBlock2.style.display = "none";
       }
    if(selectedValue == "Corporation - S corp"){
           hiddenBlock3.style.display = "block";
       } else {
          
           hiddenBlock3.style.display = "none";
       }
    if(selectedValue == "Corporation - B corp"){
           hiddenBlock4.style.display = "block";
       } else {
          
           hiddenBlock4.style.display = "none";
       }
    if(selectedValue == "Corporation - Nonprofit"){
           hiddenBlock5.style.display = "block";
       } else {
          
           hiddenBlock5.style.display = "none";
       }
   }
</script>
<script src="{{ asset('adminbackend/assets/ckeditor/ckeditor.js')}}"></script>
<script>
   CKEDITOR.replace( 'owners_name' ); 
   CKEDITOR.replace( 'percentage_of_ownership');
   CKEDITOR.replace( 'address');
   CKEDITOR.replace( 'explain_the_services');
   CKEDITOR.replace( 'counties_where');
   CKEDITOR.replace( 'company_mission_vision_and_goals');
   CKEDITOR.replace( 'name_of_the_director');
   CKEDITOR.replace( 'completion_and_submission');
   CKEDITOR.replace( 'completion_of_accreditation');
   CKEDITOR.replace( 'mock_survey');
   CKEDITOR.replace( 'nppes_login');
   CKEDITOR.replace( 'pecos_login');
   CKEDITOR.replace( 'caqh_login');
   CKEDITOR.replace( 'medicaid_number');
   CKEDITOR.replace( 'hosting_login');
   CKEDITOR.replace( 'preferred_colors');
   CKEDITOR.replace( 'consulting');
   CKEDITOR.replace( 'other');
</script>
<script>
   function toggleUploadSection() {
       var logoOption = document.getElementById('logoOption');
       var uploadSection = document.getElementById('uploadSection');
   
       if (logoOption.value === 'Yes') {
           uploadSection.style.display = 'block';
       } else {
           uploadSection.style.display = 'none';
       }
   }
</script>
<script>
   function toggleUploadSection() {
       var logoOption = document.getElementById('logoOption');
       var uploadSection = document.getElementById('uploadSection');
   
       if (logoOption.value === 'Yes') {
           uploadSection.style.display = 'block';
       } else {
           uploadSection.style.display = 'none';
       }
   }
</script>
@endsection