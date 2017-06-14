<div id="wrapper">
    <div class="questionnaire add">
        <div id="page-header">
            <div class="page-header-left">
                <a href="questionnaireList.html" class="btn-back"><i class="material-icons">arrow_back</i></a>
                <div class="page-title">新增問卷</div>
            </div>
            <div class="page-header-right">
                <a href="../web/questionnaire.html" class="page-header-btn btn-view" target="_blank">預覽</a>
                <a href="" class="page-header-btn btn-submit">提交</a>
            </div>
        </div>
        <div id="page-container">
            <!-- page-body -->
            <div id="page-body">
                <div class="add-button-wrap">
                    <ul class="add-button-list">
                        <li>
                            <a href="" data-add-title="新增問題">
                                <i class="material-icons">add_circle</i>
                            </a>
                        </li>
                        <li>
                            <a href="" data-add-title="新增分數">
                                <i class="material-icons">filter_9_plus</i>
                            </a>
                        </li>
                        <li>
                            <a href="" data-add-title="新增區塊">
                                <i class="material-icons">view_stream</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="form-wrap">
                    <div class="form-area add-wrap">
                        <div class="form-group">
                            <input type="text" class="form-control questionnaire-h1" placeholder="問卷標題">
                        </div>
                        <div class="form-group">
                            <textarea rows='1' class="form-control" placeholder='問卷說明'></textarea>
                        </div>
                    </div>
                    <div class="add-wrap">
                        <!-- 分數 -->
                        <div class="form-area">
                            <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
                            <div class="form-group">
                                <div class="form-inline s9 clearfix">
                                    <div class="form-group form-fraction clearfix">
                                        <input type="tel" class="form-control" placeholder="未命名分數標題">
                                        <span>( 每小題 </span>
                                        <input type="tel" class="form-control" placeholder="單題分數">
                                        <span> 分，共 </span>
                                        <input type="text" class="form-control">
                                        <span> 分 )</span>
                                    </div>
                                </div>
                                <div class="form-inline s1">
                                    <select class="form-control form-title-select s1">
                                        <option value="">簡答</option>
                                        <option value="">段落</option>
                                        <option value="">單選</option>
                                        <option value="">多選</option>
                                        <option value="" selected>分數</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- 分數 end -->
                        <!-- 簡答 -->
                        <div class="form-area">
                            <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
                            <div class="form-group form-group-title">
                                <div class="form-inline s9">
                                    <input type="text" class="form-control form-title questionnaire-h2" placeholder="未命名簡答問題">
                                </div>
                                <div class="form-inline s1">
                                    <select class="form-control form-title-select s1">
                                        <option value="" selected>簡答</option>
                                        <option value="">段落</option>
                                        <option value="">單選</option>
                                        <option value="">多選</option>
                                        <option value="">分數</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group-list">
                                    <div class="form-group">
                                        <div class="form-group-list-li">
                                            <input type="text" class="form-control" placeholder="簡答文字" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 簡答 end -->
                        <!-- 段落 -->
                        <div class="form-area">
                            <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
                            <div class="form-group form-group-title">
                                <div class="form-inline s9">
                                    <input type="text" class="form-control form-title questionnaire-h2" placeholder="未命名段落問題">
                                </div>
                                <div class="form-inline s1">
                                    <select class="form-control form-title-select s1">
                                        <option value="">簡答</option>
                                        <option value="" selected>段落</option>
                                        <option value="">單選</option>
                                        <option value="">多選</option>
                                        <option value="">分數</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group-list">
                                    <div class="form-group">
                                        <div class="form-group-list-li">
                                            <input type="text" class="form-control" placeholder="詳答文字" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 段落 end -->
                    </div>
                    <div class="add-wrap">
                        <!-- 單選 -->
                        <div class="form-area">
                            <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
                            <div class="form-group form-group-title">
                                <div class="form-inline s9">
                                    <input type="text" class="form-control form-title questionnaire-h2" placeholder="未命名單選問題">
                                </div>
                                <div class="form-inline s1">
                                    <select class="form-control form-title-select s1">
                                        <option value=""> 簡答</option>
                                        <option value="">段落</option>
                                        <option value="" selected>單選</option>
                                        <option value="">多選</option>
                                        <option value="">分數</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group-list">
                                    <!-- 編輯狀態 -->
                                    <div class="form-group-list-li">
                                        <div class="form-group-list-li__click">
                                            <input type="radio" class="form-radio" name="iCheck" disabled>
                                        </div>
                                        <div class="form-group-list-li__input">
                                            <input type="text" class="form-control" placeholder="選項名稱" required />
                                        </div>
                                        <div class="form-group-list-li__del">
                                            <a href="#"><i class="material-icons">close</i></a>
                                        </div>
                                    </div>
                                    <!-- 編輯狀態 end -->
                                    <div class="form-group-list-li">
                                        <div class="form-group-list-li__click">
                                            <input type="radio" class="form-radio" name="iCheck" disabled>
                                        </div>
                                        <div class="form-group-list-li__input">
                                            <a href="" class="form-group-list-li_name">新增選項</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 單選 end -->
                        <!-- 多選 -->
                        <div class="form-area">
                            <div class="form-area-drag"><i class="material-icons">drag_handle</i></div>
                            <div class="form-group form-group-title">
                                <div class="form-inline s9">
                                    <input type="text" class="form-control form-title questionnaire-h2" placeholder="未命名多選問題">
                                </div>
                                <div class="form-inline s1">
                                    <select class="form-control form-title-select s1">
                                        <option value="">簡答</option>
                                        <option value="">段落</option>
                                        <option value="">單選</option>
                                        <option value="" selected>多選</option>
                                        <option value="">分數</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-gro form-titleup">
                                <div class="form-group-list">
                                    <!-- 編輯狀態 -->
                                    <div class="form-group-list-li">
                                        <div class="form-group-list-li__click">
                                            <input type="checkbox" class="form-checkbox" name="iCheck" disabled>
                                        </div>
                                        <div class="form-group-list-li__input">
                                            <input type="text" class="form-control" placeholder="選項名稱" required />
                                        </div>
                                        <div class="form-group-list-li__del">
                                            <a href="#"><i class="material-icons">close</i></a>
                                        </div>
                                    </div>
                                    <!-- 編輯狀態 end -->
                                    <div class="form-group-list-li">
                                        <div class="form-group-list-li__click">
                                            <input type="checkbox" class="form-checkbox" name="iCheck" disabled>
                                        </div>
                                        <div class="form-group-list-li__input">
                                            <a href="" class="form-group-list-li_name">新增選項</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 多選 end -->
                    </div>
                    <div class="add-wrap">
                        <!-- 新增區塊無內容 -->
                    </div>
                </div>
            </div>
            <!-- page-body end -->

            <!-- gotop -->
            <div class="page-gotop">
                <a href="#" class="gotop"><i class="material-icons">vertical_align_top</i></a>
            </div>
            <!-- gotop end -->
        </div>
    </div>
</div>
<!-- questionnaireList -->
<script src="<?php echo $base;?>public/js/back/icheck.js"></script>
<script src="<?php echo $base;?>public/js/back/main.js?v=0.1"></script>
<!-- questionnaireList end -->