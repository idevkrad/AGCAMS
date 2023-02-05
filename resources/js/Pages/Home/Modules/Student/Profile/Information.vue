<template>
<div class="row font-size-12">
     <div class="col-md-6">
        <div class="table-responsive mt-3">
            <table class="table table-nowrap mb-0">
                <tbody>
                    <tr>
                        <th scope="row">ID Number :</th>
                        <td>{{user.username}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email :</th>
                        <td>{{user.email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Course :</th>
                        <td>{{user.student.course.acronym}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Year :</th>
                        <td>{{user.student.year.name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="table-responsive mt-3">
            <table class="table table-nowrap mb-0">
                <tbody>
                    <tr>
                        <th scope="row">Full Name :</th>
                        <td>{{user.profile.name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Birthday:</th>
                        <td>{{user.info.birthday}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Birth Place:</th>
                        <td>{{user.info.birth_place}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Sex :</th>
                        <td>{{user.info.sex.name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12"><hr/></div>
    <div class="col-md-6">
        <div class="table-responsive mt-3">
            <table class="table table-nowrap mb-0">
                <tbody>
                    <tr>
                        <th scope="row">Civil Status :</th>
                        <td>{{user.info.civil.name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Ethnic Affliation:</th>
                        <td>{{user.info.ethnic.name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="table-responsive mt-3">
            <table class="table table-nowrap mb-0">
                <tbody>
                    <tr>
                        <th scope="row">Religion :</th>
                        <td>{{user.info.religion.name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Living Condition:</th>
                        <td>{{user.info.living.name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   
</div>

</template>
<script>
    export default {
        props: ['user'],
        data() {
            return {

            }
        }
    }

</script>
