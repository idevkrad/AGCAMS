<template>
    <Header :title="title" :content="title" :items="items" />
    <div class="col-12 mt-n3 mb-n5">
        <div class="card">
            <div class="card-body" :style="{ height: height + 'px' }" style="overflow: auto;">


                <div class="row">
                    <div class="col-md-2">
                        <myUpload field="img" @crop-success="cropSuccess" v-model="photo.show" :width="500"
                            :height="500" :params="params" :headers="headers" lang-type="en" img-format="png">
                        </myUpload>
                        <div @click="toggleShow" class="fuzone" style="width: 175px; height: 160px;">
                            <div v-if="photo.url != ''"><img :src="photo.url" style="width: 150px; height: 150x;"></div>
                            <div v-else class="fu-text" @click="toggleShow"><span><i class="fa fa-picture"></i> Click
                                    here to upload<br></span></div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        
                        <b-form class="customform">
                            <div class="row mt-4"> 
                                <div class="col-md-12 mb-3">
                                    <div class="card bg-soft bg-info border shadow-none mb-2">
                                        <div class="p-1">
                                            <div class="d-flex mt-1">
                                                <div class="avatar-xs align-self-center ml-2 ms-2 mr-2">
                                                    <div class="avatar-title rounded bg-transparent"><i
                                                            class="bx bx-news h4 mt-1"></i></div>
                                                </div>
                                                <div class="overflow-hidden mr-auto align-self-center">
                                                    <h5 class="fw-bold font-size-12 mt-1 fw-bold">School Information
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label>ID Number: <span v-if="form.errors" v-text="form.errors.username" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.username">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email Address: <span v-if="form.errors" v-text="form.errors.email" class="haveerror"></span></label>
                                        <input type="email" class="form-control" v-model="user.email" style="text-transform: lowercase;">
                                    </div>
                                </div>

                                 <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Course: <span v-if="form.errors" v-text="form.errors.course_id" class="haveerror"></span></label>
                                        <Multiselect 
                                            v-model="user.student.course" 
                                            :options="courses" :allow-empty="false"
                                            :show-labels="false" 
                                            label="name" track-by="id"
                                            placeholder="Select Course"/>
                                    </div>
                                </div>

                                 <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label>Year: <span v-if="form.errors" v-text="form.errors.year_id" class="haveerror"></span></label>
                                        <Multiselect 
                                            v-model="user.student.year" 
                                            :options="years" :allow-empty="false"
                                            :show-labels="false" 
                                            label="name" track-by="id"
                                            placeholder="Select Year"/>
                                    </div>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <div class="card bg-soft bg-info border shadow-none mb-3">
                                        <div class="p-1">
                                            <div class="d-flex mt-1">
                                                <div class="avatar-xs align-self-center ml-2 ms-2 mr-2">
                                                    <div class="avatar-title rounded bg-transparent"><i
                                                            class="bx bx-news h4 mt-1"></i></div>
                                                </div>
                                                <div class="overflow-hidden mr-auto align-self-center">
                                                    <h5 class="fw-bold font-size-12 mt-1 fw-bold">Personal Information
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Firstname: <span v-if="form.errors" v-text="form.errors.firstname"
                                                class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.profile.firstname"
                                            style="text-transform: capitalize;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Middlename: <span v-if="form.errors" v-text="form.errors.middlename"
                                                class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.profile.middlename"
                                            style="text-transform: capitalize;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Lastname: <span v-if="form.errors" v-text="form.errors.lastname"
                                                class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.profile.lastname"
                                            style="text-transform: capitalize;">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Birthday: <span v-if="form.errors" v-text="form.errors.birthday"
                                                class="haveerror"></span></label>
                                        <date-picker v-model:value="user.info.birthday" type="date" format="YYYY-MM-DD"
                                            lang="en" placeholder="Select Date" :clearable="false">
                                        </date-picker>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group mb-3">
                                            <label>Place of Birth: <span v-if="form.errors"
                                                    v-text="form.errors.birth_place" class="haveerror"></span></label>
                                            <input type="text" class="form-control" v-model="user.info.birth_place"
                                                style="text-transform: capitalize;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Religion: <span v-if="form.errors" v-text="form.errors.religion_id"
                                                class="haveerror"></span></label>
                                        <Multiselect v-model="user.info.religion" :options="religions" :allow-empty="false"
                                            :show-labels="false" label="name" track-by="id"
                                            placeholder="Select Religion" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Sex: <span v-if="form.errors" v-text="form.errors.sex_id"
                                                class="haveerror"></span></label>
                                        <Multiselect v-model="user.info.sex" :options="genders" :allow-empty="false"
                                            :show-labels="false" label="name" track-by="id"
                                            placeholder="Select Civil Status" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Civil Status: <span v-if="form.errors" v-text="form.errors.civil_id"
                                                class="haveerror"></span></label>
                                        <Multiselect v-model="user.info.civil" :options="civils" :allow-empty="false"
                                            :show-labels="false" label="name" track-by="id"
                                            placeholder="Select Civil Status" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Living Condition: <span v-if="form.errors" v-text="form.errors.living_id" class="haveerror"></span></label>
                                        <Multiselect v-model="user.info.living" :options="livings"
                                            :allow-empty="false" :show-labels="false" label="name" track-by="id"
                                            placeholder="Select Living Condition" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Ethnic Affiliation: <span v-if="form.errors" v-text="form.errors.ethnic_id" class="haveerror"></span></label>
                                        <Multiselect v-model="user.info.ethnic" :options="ethnics" :allow-empty="false"
                                            :show-labels="false" label="name" track-by="id"
                                            placeholder="Select Ethnic" />
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Language/Dialect Spoken: <span v-if="form.errors" v-text="form.errors.languages" class="haveerror"></span></label>
                                        <Multiselect v-model="user.languages" :options="languages" :allow-empty="false"
                                            :show-labels="false" :multiple="true" label="name" track-by="id"
                                            placeholder="Select language/Dialect" />
                                    </div>
                                </div>

                                <div class="col-md-12 mt-n2 mb-2">
                                    <hr />
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Zamboanga City Address: <span v-if="form.errors" v-text="form.errors['city.name']" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.info.city.name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telephone No.:</label>
                                        <input type="text" class="form-control" v-model="user.info.city.telephone">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Mobile No.: <span v-if="form.errors" v-text="form.errors['city.mobile']" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.info.city.mobile">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Province Address: <span v-if="form.errors" v-text="form.errors['city.name']" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.info.province.name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telephone No.: <span v-if="form.errors"
                                                v-text="form.errors.province_telephone"
                                                class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.info.province.telephone">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Mobile No.: <span v-if="form.errors" v-text="form.errors.province_mobile"
                                                class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.info.province.mobile">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-n2 mb-2">
                                    <hr />
                                </div>

                            </div>
                        </b-form>

                        <div class="row mt-n3">
                            <div class="col-md-12">
                                <div class="">
                                    <label style="margin-bottom: -5px; font-size: 11px;">Incase of emergency:</label>
                                    <div class="input-group me-2 mb-1">
                                        <label class="input-group-text" :class="(form.errors) ? (form.errors['emergency.name']) ? 'classred' : '' :''">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" style="width: 20%;" v-model="user.info.emergency.name" />
                                        <label class="input-group-text" :class="(form.errors) ? (form.errors['emergency.relation']) ? 'classred' : '' :''">Relation</label>
                                        <select v-model="user.info.emergency.relation" class="form-select" style="width: 17%;">
                                            <option value="" selected disabled>Select Relation</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Father">Father</option>
                                            <option value="Father">Relative</option>
                                            <option value="Father">Someone</option>
                                        </select>
                                        <label class="input-group-text" :class="(form.errors) ? (form.errors['emergency.address']) ? 'classred' : '' :''">Address</label>
                                        <input type="text" class="form-control" placeholder="Enter Address" style="width: 20%;" v-model="user.info.emergency.address" />
                                        <label class="input-group-text" :class="(form.errors) ? (form.errors['emergency.contact']) ? 'classred' : '' :''">Phone</label>
                                        <input type="text" class="form-control" placeholder="Enter Contact" style="width: 20%;" v-model="user.info.emergency.contact" />
                                    </div>
                                </div>
                            </div>
                        </div>

                 <!--------------------------------------------------------------------------------------------------------------------------->

                        <b-form class="">
                            <div class="row mt-5">

                                <div class="col-md-12 mb-3">
                                    <div class="card bg-soft bg-info border shadow-none mb-3">
                                        <div class="p-1">
                                            <div class="d-flex mt-1">
                                                <div class="avatar-xs align-self-center ml-2 ms-2 mr-2">
                                                    <div class="avatar-title rounded bg-transparent"><i
                                                            class="bx bx-news h4 mt-1"></i></div>
                                                </div>
                                                <div class="overflow-hidden mr-auto align-self-center">
                                                    <h5 class="fw-bold font-size-12 mt-1 fw-bold">SCHOLASTIC DATA</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group me-2 mb-1">
                                        <label class="input-group-text" :class="(form.errors) ? (form.errors['gradeschool.name'] || form.errors['gradeschool.address'] || form.errors['gradeschool.graduated'] || form.errors['gradeschool.gpa']) ? 'classred' : '' :''" style="width: 15%;">Grade School</label>
                                        <input type="text" v-model="user.scholastic.gradeschool.name" class="form-control" placeholder="Name of School" style="width: 30%;" />
                                        <input type="text" v-model="user.scholastic.gradeschool.address" class="form-control" placeholder="Address" style="width: 30%;"/>
                                        <input type="text" v-model="user.scholastic.gradeschool.graduated" class="form-control" placeholder="Year Graduated" style="width: 15%;" />
                                        <input type="text" v-model="user.scholastic.gradeschool.gpa" class="form-control" placeholder="GPA" style="width: 10%;" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group me-2 mb-1">
                                        <label class="input-group-text" :class="(form.errors) ? (form.errors['highschool.name'] || form.errors['highschool.address'] || form.errors['highschool.graduated'] || form.errors['highschool.gpa']) ? 'classred' : '' :''" style="width: 15%;">High School</label>
                                        <input type="text" v-model="user.scholastic.highschool.name" class="form-control" placeholder="Name of School" style="width: 30%;" />
                                        <input type="text" v-model="user.scholastic.highschool.address" class="form-control" placeholder="Address" style="width: 30%;"/>
                                        <input type="text" v-model="user.scholastic.highschool.graduated" class="form-control" placeholder="Year Graduated" style="width: 15%;" />
                                        <input type="text" v-model="user.scholastic.highschool.gpa" class="form-control" placeholder="GPA" style="width: 10%;" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group me-2 mb-1">
                                        <label class="input-group-text" :class="(form.errors) ? (form.errors['college.name'] || form.errors['college.address'] || form.errors['college.graduated'] || form.errors['college.gpa']) ? 'classred' : '' :''" style="width: 15%;">College</label>
                                        <input type="text" v-model="user.scholastic.college.name" class="form-control" placeholder="Name of School" style="width: 30%;" />
                                        <input type="text" v-model="user.scholastic.college.address" class="form-control" placeholder="Address" style="width: 30%;"/>
                                        <input type="text" v-model="user.scholastic.college.graduated" class="form-control" placeholder="Year Graduated" style="width: 15%;" />
                                        <input type="text" v-model="user.scholastic.college.gpa" class="form-control" placeholder="GPA" style="width: 10%;" />
                                    </div>
                                </div>
                                <div class="col-md-12 mt-n2 mb-2">
                                    <button @click="add" class="btn btn-primary btn-sm" type="button"
                                        style="margin-bottom: -50px;">Add Awards/Citations/Honors</button>
                                    <hr />
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group me-2 mb-1" v-for="(field, index) in user.scholastic.awards" :key="index">
                                        <label class="input-group-text" style="width: 3%;">{{index+1}}. </label>
                                        <input type="text" class="form-control" placeholder="Institution"
                                            style="width: 30%;" v-model="field.name" />
                                        <input type="text" class="form-control" placeholder="Position"
                                            style="width: 30%;" v-model="field.position" />
                                        <input type="text" class="form-control" placeholder="Year Attended"
                                            style="width: 15%;" v-model="field.year" />
                                        <button type="button" @click="remove(index)" class="btn btn-primary"> <i
                                                class='bx bx-trash'></i></button>
                                    </div>
                                </div>

                            </div>
                        </b-form>

                  <!--------------------------------------------------------------------------------------------------------------------------->

                        <b-form class="customform">
                            <div class="row mt-5">

                                <div class="col-md-12 mb-3">
                                    <div class="card bg-soft bg-info border shadow-none mb-3">
                                        <div class="p-1">
                                            <div class="d-flex mt-1">
                                                <div class="avatar-xs align-self-center ml-2 ms-2 mr-2">
                                                    <div class="avatar-title rounded bg-transparent"><i
                                                            class="bx bx-news h4 mt-1"></i></div>
                                                </div>
                                                <div class="overflow-hidden mr-auto align-self-center">
                                                    <h5 class="fw-bold font-size-12 mt-1 fw-bold">HEALTH QUESTIONNAIRE
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <label>Height: <span v-if="form.errors" v-text="form.errors.height"
                                                class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.health.height">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <label>Weight: <span v-if="form.errors" v-text="form.errors.weight"
                                                class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.health.weight">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label>Physical and/or Learning Disabilities: <span v-if="form.errors" v-text="form.errors.disabilities" class="haveerror"></span></label>
                                        <input type="text" class="form-control" v-model="user.health.disabilities">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="align-middle">Do you?  <span style="font-size: 9px;" v-if="form.errors" class="haveerror">({{form.errors.doyous}})</span></th>
                                                    <th class="text-end">Yes</th>
                                                    <th class="text-end">No</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(field, index) in doyous" :key="index">
                                                    <td>
                                                        {{index+1}}. {{field.name}}
                                                        <p class="font-size-10 text-muted mb-n1" v-if="field.question != null">{{field.question}}</p>
                                                        <input v-if="field.question != null && user.health.doyous[index] && user.health.doyous[index]['value'] == 1" type="text" v-model="user.health.doyous[index]['answer']" class="form-control form-control-sm mt-2">
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="custom-control custom-radio" style="float: right;">
                                                            <input type="radio" id="customRadio1" class="custom-control-input me-2"  :value="{id: field.id, value: 1}" v-model="user.health.doyous[index]">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="custom-control custom-radio" style="float: right;">
                                                            <input type="radio" id="customRadio2" class="custom-control-input me-2" :value="{id: field.id, value: 0}" v-model="user.health.doyous[index]">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="align-middle">Have you? <span style="font-size: 9px;" v-if="form.errors" class="haveerror">({{form.errors.haveyous}})</span></th>
                                                    <th class="text-end">Yes</th>
                                                    <th class="text-end">No</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(field, index) in haveyous" :key="index">
                                                    <td>
                                                        {{index+1}}. {{field.name}}
                                                        <p class="font-size-10 text-muted mb-n1" v-if="field.question != null">{{field.question}}</p>
                                                        <input v-if="field.question != null && user.health.haveyous[index] && user.health.haveyous[index]['value'] == 1" type="text" v-model="user.health.haveyous[index]['answer']" class="form-control form-control-sm mt-2">
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="custom-control custom-radio" style="float: right;">
                                                            <input type="radio" id="customRadio1" class="custom-control-input me-2"  :value="{id: field.id, value: 1}" v-model="user.health.haveyous[index]">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="custom-control custom-radio" style="float: right;">
                                                            <input type="radio" id="customRadio2" class="custom-control-input me-2" :value="{id: field.id, value: 0}" v-model="user.health.haveyous[index]">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </b-form>


                     <!--------------------------------------------------------------------------------------------------------------------------->

                        <b-form class="">
                            <div class="row mt-5">

                                <div class="col-md-12 mb-3">
                                    <div class="card bg-soft bg-info border shadow-none mb-3">
                                        <div class="p-1">
                                            <div class="d-flex mt-1">
                                                <div class="avatar-xs align-self-center ml-2 ms-2 mr-2">
                                                    <div class="avatar-title rounded bg-transparent"><i
                                                            class="bx bx-news h4 mt-1"></i></div>
                                                </div>
                                                <div class="overflow-hidden mr-auto align-self-center">
                                                    <h5 class="fw-bold font-size-12 mt-1 fw-bold">FAMILY BACKGROUND
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top: -10px;">
                                            <label style="margin-bottom: -5px; font-size: 11px;">Father: <span style="font-size: 9px;" v-if="(form.errors)" class="haveerror">{{ (form.errors['father.name'] || form.errors['father.living'] || form.errors['father.occupation'] || form.errors['father.age']) ? '(Please fill up all)' : ''}}</span></label>
                                            <div class="input-group me-2 mb-1">
                                                <input v-model="user.family.father.name" type="text" class="form-control" placeholder="Name" style="width: 30%;"/>
                                                <select v-model="user.family.father.religion" class="form-select" style="width: 25%;">
                                                    <option value="" selected disabled>Select Religion</option>
                                                    <option :value="field.name" v-for="(field, index) in religions" :key="index">{{field.name}}</option>
                                                </select>
                                                <input v-model="user.family.father.occupation" type="text" class="form-control" placeholder="Occupation" style="width: 25%;" />
                                                <input v-model="user.family.father.age" type="text" class="form-control" placeholder="Age" style="width: 7%;"/>
                                                <select v-model="user.family.father.living" class="form-select" style="width: 13%;">
                                                    <option value="" selected disabled>Living?</option>
                                                    <option value="Alive">Alive</option>
                                                    <option value="Deceased">Deceased</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="margin-top: 4px;">
                                           <label style="margin-bottom: -5px; font-size: 11px;">Mother: <span style="font-size: 9px;" v-if="(form.errors)" class="haveerror">{{ (form.errors['mother.name'] || form.errors['mother.living'] || form.errors['mother.occupation'] || form.errors['mother.age']) ? '(Please fill up all)' : ''}}</span></label>
                                            <div class="input-group me-2 mb-1">
                                                <input v-model="user.family.mother.name" type="text" class="form-control" placeholder="Name" style="width: 30%;"/>
                                                <select v-model="user.family.mother.religion" class="form-select" style="width: 25%;">
                                                    <option value="" selected disabled>Select Religion</option>
                                                    <option :value="field.name" v-for="(field, index) in religions" :key="index">{{field.name}}</option>
                                                </select>
                                                <input v-model="user.family.mother.occupation" type="text" class="form-control" placeholder="Occupation" style="width: 25%;" />
                                                <input v-model="user.family.mother.age" type="text" class="form-control" placeholder="Age" style="width: 7%;"/>
                                                <select v-model="user.family.mother.living" class="form-select" style="width: 13%;">
                                                    <option value="" selected disabled>Living?</option>
                                                    <option value="Alive">Alive</option>
                                                    <option value="Deceased">Deceased</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12" v-if="user.info.civil.id == 6" style="margin-top: 4px;">
                                           <label style="margin-bottom: -5px; font-size: 11px;">Spouse: <span style="font-size: 9px;" v-if="(form.errors)" class="haveerror">{{ (form.errors['spouse.name'] || form.errors['spouse.living'] || form.errors['spouse.occupation'] || form.errors['spouse.age']) ? '(Please fill up all)' : ''}}</span></label>
                                            <div class="input-group me-2 mb-1">
                                                <input v-model="user.family.spouse.name" type="text" class="form-control" placeholder="Name" style="width: 30%;"/>
                                                <select v-model="user.family.spouse.religion" class="form-select" style="width: 25%;">
                                                    <option value="" selected disabled>Select Religion</option>
                                                     <option :value="field.name" v-for="(field, index) in religions" :key="index">{{field.name}}</option>
                                                </select>
                                                <input v-model="user.family.spouse.occupation" type="text" class="form-control" placeholder="Occupation" style="width: 25%;" />
                                                <input v-model="user.family.spouse.age" type="text" class="form-control" placeholder="Age" style="width: 7%;"/>
                                                <select v-model="user.family.spouse.living" class="form-select" style="width: 13%;">
                                                    <option value="" selected disabled>Living?</option>
                                                    <option value="Alive">Alive</option>
                                                    <option value="Deceased">Deceased</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row customform">
                                        <div class="col-md-12">
                                            <div class="form-group mt-n1 mb-3">
                                                <label>Family Structure: <span v-if="form.errors"
                                                v-text="form.errors.languages" class="haveerror"></span></label>
                                                <Multiselect v-model="user.family.structure" :options="structures" :allow-empty="false"
                                                    :show-labels="false" label="name" track-by="id"
                                                    placeholder="Select type" />
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Parents: <span v-if="form.errors"
                                                v-text="form.errors.languages" class="haveerror"></span></label>
                                                <Multiselect v-model="user.family.parent" :options="parents" :allow-empty="false"
                                                    :show-labels="false" label="name" track-by="id"
                                                    placeholder="Select type" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-n2 mb-2">
                                    <button @click="addSiblings" class="btn btn-primary btn-sm" type="button"
                                        style="margin-bottom: -50px;">Add Siblings</button>
                                    <hr />
                                </div>
                                <div class="col-md-12">
                                    <label v-if="user.family.siblings.length > 0" style="margin-bottom: -5px; font-size: 11px;">(Please list down the names and ages of your siblings from eldest to youngest including yourself.)</label>
                                    <div class="input-group me-2 mb-1" v-for="(field, index) in user.family.siblings" :key="index">
                                        <label class="input-group-text" style="width: 3%;">{{index+1}}. </label>
                                        <input type="text" class="form-control" placeholder="Name" style="width: 30%;" v-model="field.name" />
                                        <input type="text" class="form-control" placeholder="Age" style="width: 10%;" v-model="field.age" />
                                        <input type="text" class="form-control" placeholder="Occupation" style="width: 25%;" v-model="field.occupation" />
                                        <input type="text" class="form-control" placeholder="Company/School" style="width: 25%;" v-model="field.cs" />
                                        <button type="button" @click="removeSiblings(index)" class="btn btn-primary"> <i class='bx bx-trash'></i></button>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-n2 mb-2" v-if="user.info.civil.id != 5 && user.info.civil != ''">
                                    <button @click="addC" class="btn btn-primary btn-sm" type="button"
                                        style="margin-bottom: -50px;">Add Children</button>
                                    <hr />
                                </div>
                                <div class="col-md-12" v-if="user.info.civil.id != 5">
                                    <label v-if="user.family.childrens.length > 0" style="margin-bottom: -5px; font-size: 11px;">(If you are married, list down the names and ages of your children from oldest to youngest.)</label>
                                    <div class="input-group me-2 mb-1" v-for="(field, index) in user.family.childrens" :key="index">
                                        <label class="input-group-text" style="width: 3%;">{{index+1}}. </label>
                                        <input type="text" class="form-control" placeholder="Name"
                                            style="width: 30%;" v-model="field.name" />
                                        <input type="text" class="form-control" placeholder="Age"
                                            style="width: 10%;" v-model="field.age" />
                                        <input type="text" class="form-control" placeholder="Grade (if applicable)"
                                            style="width: 25%;" v-model="field.grade" />
                                        <input type="text" class="form-control" placeholder="School (if applicable)"
                                            style="width: 25%;" v-model="field.school" />
                                        <button type="button" @click="removeC(index)" class="btn btn-primary"> <i
                                                class='bx bx-trash'></i></button>
                                    </div>
                                </div>

                            </div>
                        </b-form>

                        <!--------------------------------------------------------------------------------------------------------------------------->

                         <b-form class="">
                            <div class="row mt-5">

                                <div class="col-md-12 mb-3">
                                    <div class="card bg-soft bg-info border shadow-none mb-3">
                                        <div class="p-1">
                                            <div class="d-flex mt-1">
                                                <div class="avatar-xs align-self-center ml-2 ms-2 mr-2">
                                                    <div class="avatar-title rounded bg-transparent"><i
                                                            class="bx bx-news h4 mt-1"></i></div>
                                                </div>
                                                <div class="overflow-hidden mr-auto align-self-center">
                                                    <h5 class="fw-bold font-size-12 mt-1 fw-bold">EDUCATIONAL AND CAREER PLANS 
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top: -10px;">
                                            <label class="fw-bold" style=" margin-bottom: 2px; font-size: 13px;">What is your choice of course program and why?</label>
                                            <div class="input-group input-group-sm me-2 mb-1">
                                                <label class="input-group-text" style="width: 15%;" :class="(form.errors) ? (form.errors['choices.'+0+'.choice']) ? 'classred' : '' :''">1st Choice</label>
                                                <input type="text" class="form-control" style="width: 35%;" v-model="user.education.choices[0]['choice']" />
                                                <label class="input-group-text" style="width: 10%;" :class="(form.errors) ? (form.errors['choices.'+0+'.reason']) ? 'classred' : '' :''">Reason</label>
                                                <input type="text" class="form-control" style="width: 40%;" v-model="user.education.choices[0]['reason']"/>
                                            </div>
                                            <div class="input-group input-group-sm me-2 mb-1">
                                                <label class="input-group-text" style="width: 15%;" :class="(form.errors) ? (form.errors['choices.'+1+'.choice']) ? 'classred' : '' :''">2nd Choice</label>
                                                <input type="text" class="form-control" style="width: 35%;" v-model="user.education.choices[1]['choice']" />
                                                <label class="input-group-text" style="width: 10%;" :class="(form.errors) ? (form.errors['choices.'+1+'.reason']) ? 'classred' : '' :''">Reason</label>
                                                <input type="text" class="form-control" style="width: 40%;" v-model="user.education.choices[1]['reason']"/>
                                            </div>
                                            <div class="input-group input-group-sm me-2 mb-1">
                                                <label class="input-group-text" style="width: 15%;" :class="(form.errors) ? (form.errors['choices.'+2+'.choice']) ? 'classred' : '' :''">3rd Choice</label>
                                                <input type="text" class="form-control" style="width: 35%;" v-model="user.education.choices[2]['choice']" />
                                                <label class="input-group-text" style="width: 10%;" :class="(form.errors) ? (form.errors['choices.'+2+'.reason']) ? 'classred' : '' :''">Reason</label>
                                                <input type="text" class="form-control" style="width: 40%;" v-model="user.education.choices[2]['reason']" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="margin-top: -10px;">
                                    <label class="fw-bold" style=" margin-bottom: 2px; font-size: 13px;">Who helped you make your educational and career choices? <span v-if="form.errors" class="haveerror">{{(form.errors.helped) ? '(required)' : ''}}</span></label>
                                    <textarea class="form-control" v-model="user.education.helped" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
                                </div>
                                <div class="col-md-12 mt-1 mb-1">
                                    <hr />
                                </div>
                                <div class="col-md-7">
                                    <label class="fw-bold" style=" margin-bottom: 2px; font-size: 13px;">Why have you decided to go to college? <span class="text-muted font-size-10">(Check as many as you think are true)</span></label>
                                    <div class="row">
                                        <div class="col-md-6 mt-2">
                                            <input v-model="user.education.decided" value="To get a liberal education" class="form-check-input mb-2" type="checkbox" id="gridCheck"/>
                                            <label class="form-check-label ms-2" for="gridCheck">To get a liberal education</label><br>
                                            <input v-model="user.education.decided" value="To prepare for a vocation" class="form-check-input mb-2" type="checkbox" id="gridCheck"/>
                                            <label class="form-check-label ms-2" for="gridCheck">To prepare for a vocation</label><br>
                                             <input v-model="user.education.decided" value="For a prestige of a college degree" class="form-check-input mb-2" type="checkbox" id="gridCheck"/>
                                            <label class="form-check-label ms-2" for="gridCheck">For a prestige of a college degree</label><br>
                                             <input v-model="user.education.decided" value="To get a job" class="form-check-input mb-2" type="checkbox" id="gridCheck"/>
                                            <label class="form-check-label ms-2" for="gridCheck">To get a job</label><br>
                                             <input v-model="user.education.decided" value="To be with old school friends" class="form-check-input mb-2" type="checkbox" id="gridCheck"/>
                                            <label class="form-check-label ms-2" for="gridCheck">To be with old school friends</label><br>
                                        </div>
                                         <div class="col-md-6 mt-2">
                                            <input v-model="user.education.decided" value="To make friends and helpful connections" class="form-check-input mb-2" type="checkbox" id="gridCheck"/>
                                            <label class="form-check-label ms-2" for="gridCheck">To make friends and helpful connections</label><br>
                                            <input v-model="user.education.decided" value="For social enjoyment (College life)" class="form-check-input mb-2" type="checkbox" id="gridCheck"/>
                                            <label class="form-check-label ms-2" for="gridCheck">For social enjoyment (College life)</label><br>
                                             <input v-model="user.education.decided" value="I don't know why" class="form-check-input mb-2" type="checkbox" id="gridCheck"/>
                                            <label class="form-check-label ms-2" for="gridCheck">I don't know why</label><br>
                                             <input v-model="user.education.decided" value="To please my parents/relatives" class="form-check-input mb-2" type="checkbox" id="gridCheck"/>
                                            <label class="form-check-label ms-2" for="gridCheck">To please my parents/relatives</label><br>
                                             <input v-model="user.education.decided" value="others" class="form-check-input mb-2" type="checkbox" id="gridCheck"/>
                                            <label class="form-check-label ms-2" for="gridCheck">Others</label><br>
                                        </div>
                                    </div>

                                   
                                </div>
                                <div class="col-md-5">
                                    <label class="fw-bold" style=" margin-bottom: 2px; font-size: 13px;">Financial support in College? <span v-if="form.errors" class="haveerror">{{(form.errors.helped) ? '(required)' : ''}}</span></label>
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2 mb-2"  value="Entirely supported by family" v-model="user.education.support">
                                            <label class="form-check-label ms-2" for="gridCheck">Entirely supported by family</label><br>
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2 mb-2"  value="Scholarship" v-model="user.education.support">
                                            <label class="form-check-label ms-2" for="gridCheck">Scholarship</label><br>
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2 mb-2"  value="Student Assistant" v-model="user.education.support">
                                            <label class="form-check-label ms-2" for="gridCheck">Student Assistant</label><br>
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2 mb-2"  value="Full/Part time worker outside ADZU" v-model="user.education.support">
                                            <label class="form-check-label ms-2" for="gridCheck">Full/Part time worker outside ADZU</label><br>
                                            <input type="radio" id="customRadio1" class="custom-control-input me-2 mb-2"  value="Others" v-model="user.education.support">
                                            <label class="form-check-label ms-2" for="gridCheck">Others</label><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1 mb-3">
                                    <hr />
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top: -10px;">
                                            <label class="fw-bold" style=" margin-bottom: 2px; font-size: 13px;">Occupational Preferences: 
                                                <span class="text-muted font-size-10">(Regardless of present course choice)</span>
                                                <span v-if="form.errors" class="haveerror">{{(form.errors['preferences.'+0+'.name'] || form.errors['preferences.'+1+'.name'] || form.errors['preferences.'+2+'.name']) ? '(required)' : ''}}</span>
                                                </label>
                                            <div class="input-group input-group-sm me-2 mb-1">
                                                <input type="text" placeholder="occupation" class="form-control" style="width: 40%;" v-model="user.education.preferences[0]['name']" />
                                                <input type="text" placeholder="reason" class="form-control" style="width: 60%;" v-model="user.education.preferences[0]['reason']"/>
                                            </div>
                                            <div class="input-group input-group-sm me-2 mb-1">
                                                <input type="text" placeholder="occupation" class="form-control" style="width: 40%;" v-model="user.education.preferences[1]['name']" />
                                                <input type="text" placeholder="reason" class="form-control" style="width: 60%;" v-model="user.education.preferences[1]['reason']"/>
                                            </div>
                                            <div class="input-group input-group-sm me-2 mb-1">
                                                 <input type="text" placeholder="occupation" class="form-control" style="width: 40%;" v-model="user.education.preferences[2]['name']" />
                                                <input type="text" placeholder="reason" class="form-control" style="width: 60%;" v-model="user.education.preferences[2]['reason']"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="margin-top: -10px;">
                                    <label class="fw-bold" style=" margin-bottom: 2px; font-size: 13px;">Principal reason for selecting Ateneo de Zamboanga University <span v-if="form.errors" class="haveerror">{{(form.errors.support) ? '(required)' : ''}}</span></label>
                                    <textarea class="form-control" v-model="user.education.reason" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
                                </div>

                                 <div class="col-md-12 mt-1 mb-1">
                                    <hr />
                                </div>

                            </div>
                         </b-form>
                         

                          <b-button class="w-lg" @click="create('ok')" variant="primary" :disabled="form.processing" block style="float: right;">Save</b-button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import DatePicker from 'vue-datepicker-next';
    import 'vue-datepicker-next/index.css';
    import myUpload from 'vue-image-crop-upload/upload-3.vue';
    import Multiselect from '@suadelabs/vue3-multiselect';
    import Header from "@/Shared/Header.vue";
    import _ from 'lodash';
    export default {
        inject: ['count', 'height'],
        components: {
            Header,
            myUpload,
            Multiselect,
            DatePicker
        },
        props: ['dropdowns', 'questions', 'courses','u'],
        created(){
            this.user = this.u.data;
            console.log(this.u);
        },
        data() {
            return {
                currentUrl: window.location.origin,
                title: "View Student",
                items: [{
                        text: "User",
                        href: "/",
                    },
                    {
                        text: "Lists",
                        active: true,
                    },
                ],
                lists: [],
                meta: {},
                links: {},
                photo: {
                    show: false,
                    url: '',
                    signature: ''
                },
                params: {
                    token: '123456798',
                    name: 'avatar'
                },
                headers: {
                    smail: '*_~'
                },
                form: {},
                user: {
                    username: '',
                    email: '',
                    img: '',
                    student:{
                        course: '',
                        year: '',
                    },
                    profile : {
                        firstname: '',
                        middlename: '',
                        lastname: '',
                    },
                    info: {
                        birthday: '',
                        birth_place: '',
                        religion: '',
                        civil: '',
                        living: '',
                        sex: '',
                        ethnic: '',
                        emergency: {name: '',relation: '',address: '',contact: ''},
                        city: {name: '',telephone: '', mobile: ''},
                        province: {name: '',telephone: '',mobile: ''},
                    },
                    languages: [],
                    scholastic: {
                        gradeschool: {name: '',address:'',graduated:'',gpa:''},
                        highschool: {name: '',address:'',graduated:'',gpa:''},
                        college: {name: '',address:'',graduated:'',gpa:''},
                        awards: [{}],
                    },
                    health: {
                        weight: '',
                        height: '',
                        disabilities: '',
                        doyous: [],
                        haveyous: []
                    },
                    family: { 
                        father: {name: '',occupation:'',living: '', religion: '', age: '',}, 
                        mother: {name: '',occupation:'',living: '', religion: '', age: ''}, 
                        spouse:{name: '',occupation:'',living: '', age: '', religion: ''}, 
                        parent:'', 
                        structure: '', 
                        siblings:[], 
                        childrens:[]
                    },
                    education: {
                        choices:[{choice:'',reason:''},{choice:'',reason:''},{choice:'',reason:''}], 
                        helped: '',
                        decided: [], 
                        support: '',
                        reason: '', 
                        preferences: [{name: '', reason: ''},{name: '', reason: ''},{name: '', reason: ''}]}
                }
            }
        },

        computed: {
            religions: function () {
                return this.dropdowns.filter(x => x.classification === 'Religion');
            },
            livings: function () {
                return this.dropdowns.filter(x => x.classification === 'Living Condition');
            },
            civils: function () {
                return this.dropdowns.filter(x => x.classification === 'Civil Status');
            },
            genders: function () {
                return this.dropdowns.filter(x => x.classification === 'Sex');
            },
            ethnics: function () {
                return this.dropdowns.filter(x => x.classification === 'Ethnicities');
            },
            languages: function () {
                return this.dropdowns.filter(x => x.classification === 'Languages/Dialect');
            },
            structures: function () {
                return this.dropdowns.filter(x => x.classification === 'Family Structure');
            },
            years: function () {
                return this.dropdowns.filter(x => x.classification === 'Year');
            },
            parents: function () {
                return this.dropdowns.filter(x => x.classification === 'Parents');
            },
            doyous: function () {
                return this.questions.filter(x => x.is_doyou === 1);
            },
            haveyous: function () {
                return this.questions.filter(x => x.is_doyou === 0);
            }
        },

        methods: {
            create(){
                this.form = this.$inertia.form({
                    id: this.user.id,
                    username: this.user.username,
                    email: this.user.email,
                    course_id: (this.user.student.course) ? this.user.student.course.id : '',
                    year_id: (this.user.student.year) ? this.user.student.year.id : '',
                    firstname: this.user.profile.firstname,
                    lastname: this.user.profile.lastname,
                    middlename: this.user.profile.middlename,
                    mobile: this.user.info.city.mobile,
                    birthday: (this.user.info.birthday != '') ? new Date(this.user.info.birthday).toLocaleDateString("af-ZA") : '',
                    birth_place: this.user.info.birth_place,
                    languages: this.user.languages,
                    emergency: this.user.info.emergency,
                    province: this.user.info.province,
                    city: this.user.info.city,
                    living_id: (this.user.info.living) ? this.user.info.living.id : '',
                    ethnic_id: (this.user.info.ethnic) ? this.user.info.ethnic.id : '',
                    sex_id: (this.user.info.sex) ? this.user.info.sex.id : '',
                    civil_id: (this.user.info.civil) ? this.user.info.civil.id : '',
                    religion_id: (this.user.info.religion) ? this.user.info.religion.id : '',
                    gradeschool: this.user.scholastic.gradeschool,
                    highschool: this.user.scholastic.highschool,
                    college: this.user.scholastic.college,
                    height: this.user.health.height,
                    weight: this.user.health.weight,
                    disabilities: this.user.health.disabilities,
                    doyous: this.user.health.doyous,
                    haveyous: this.user.health.haveyous,
                    structure_id: (this.user.family.structure) ? this.user.family.structure.id : '',
                    parent_id: (this.user.family.parent) ? this.user.family.structure.id : '',
                    father: this.user.family.father,
                    mother: this.user.family.mother,
                    spouse: this.user.family.spouse,
                    childrens: this.user.family.childrens,
                    siblings: this.user.family.siblings,
                    choices: this.user.education.choices,
                    helped: this.user.education.helped,
                    support: this.user.education.support,
                    reason: this.user.education.reason,
                    decided: this.user.education.decided,
                    preferences: this.user.education.preferences,
                    img: this.user.img,
                    d: this.doyous.length,
                    h: this.haveyous.length,
                })

                this.form.post('/students',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.hide();
                    }
                });
            },
            add() {
                this.user.scholastic.awards.push({name: '',year: '',position: '' });
            },

            remove(index) {
                if (confirm("Are you sure you want to remove?"))this.user.awards.splice(index, 1);
            },
            addSiblings() {
                this.user.family.siblings.push({name: '',age: '',occupation: '',cs: '' });
            },
            removeSiblings(index) {
                if (confirm("Are you sure you want to remove?"))this.user.family.siblings.splice(index, 1);
            },
            addC() {
                this.user.family.childrens.push({name: '',age: '',grade: '',school: '' });
            },
            removeC(index) {
                if (confirm("Are you sure you want to remove?"))this.user.family.childrens.splice(index, 1);
            },
            toggleShow() {
                this.photo.show = !this.photo.show;
            },

            cropSuccess(imgDataUrl, field) {
                this.photo.url = imgDataUrl;
                this.user.img = imgDataUrl;
            }
        }
    }

</script>
<style>
    .multiselect__tag {
        font-size: 9px;
    }
    .classred {
        color: red;
    }

</style>

