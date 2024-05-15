<template>
    <bootstrap-authenticated-layout>
        <div class="card shadow-sm">
            <div class="card-header">
                <h4>Disbursement <el-button type="primary" size="mini" class="float-end" @click="drawer = true">Request</el-button></h4>
            </div>
            <div class="card-body">
                <el-table :data="disbursements" style="width: 100%">
                    <el-table-column prop="id" label="ID" />
                    <el-table-column prop="project_id" label="Project ID" />
                    <el-table-column prop="amount" label="Amount" />
                </el-table>

                <el-drawer v-model="drawer" :direction="direction"
                    size="50%"
                    :before-close="handleClose">
                    <template #header>
                        <h4>Request Disbursement</h4>
                    </template>
                    <template #default>
                        <div style="padding: 0px 1rem;">
                            <el-form
                                ref="ruleFormRef"
                                :model="ruleForm"
                                label-position="top"
                                label-width="120px"
                                class="demo-ruleForm"
                                status-icon
                            >
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <el-form-item label="Project" prop="name">
                                            <el-select v-model="ruleForm.region" placeholder="Activity zone">
                                                <el-option label="Zone one" value="shanghai" />
                                                <el-option label="Zone two" value="beijing" />
                                            </el-select>
                                        </el-form-item>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <el-form-item label="Project Unit" prop="region">
                                            <el-select v-model="ruleForm.region" placeholder="Activity zone">
                                                <el-option label="Zone one" value="shanghai" />
                                                <el-option label="Zone two" value="beijing" />
                                            </el-select>
                                        </el-form-item>
                                    </div>
                                </div>
                            </el-form>
                        </div>
                    </template>
                    <template #footer>
                    <div style="flex: auto">
                        <el-button @click="handleClose">cancel</el-button>
                        <el-button type="primary" @click="drawer = false">confirm</el-button>
                    </div>
                    </template>
                </el-drawer>
            </div>
        </div>
    </bootstrap-authenticated-layout>
</template>

<script>
    import { ElMessageBox } from 'element-plus'
    import BootstrapAuthenticatedLayout from '@/Layouts/Authenticated'

    export default {
        props: ['disbursements'],
        components: {
            BootstrapAuthenticatedLayout,
        },
        data(){
            return {
                drawer: false,
                direction: 'rtl',
                ruleForm: {
                    name: 'Hello',
                    region: '',
                    count: '',
                    date1: '',
                    date2: '',
                    delivery: false,
                    type: [],
                    resource: '',
                    desc: '',
                }
            }
        },
        methods:{
            handleClose(){
                ElMessageBox.confirm('Are you sure you want to close this?')
                .then(() => {
                    this.drawer = false;
                    done()
                })
                .catch(() => {
                // catch error
                })

            }
        }
    }
</script>
