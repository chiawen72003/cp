<script language="javascript">
    //模組初始化資料
    var build_option = '<?php echo $model_data['modelData_6']['build_option'];?>';
</script>
    <div id="m6_module_area" style="display:none">
    <div id="m6_game_1">
        <div class="speed">
            <ul>
                <li>
                    <div class="s_1">1</div>
                </li>
            </ul>
        </div>
        <!-- 關卡敘述-->
        <div class="wrap_title">
            <?php echo $model_data['modelData_6']['levelDsc']['1']; ?>
        </div>
        <!-- 關卡敘述 END -->
        <?php echo $model_data['modelData_6']['page_model']; ?>
    </div>
    <!-----按鈕區----->
    <div id="but_mod">
        <div class="area">
            <ul>
                <li class="aa">
                    <button class="button button-raised" onclick="m6_goNextModel()" type="button">下一關</button>
                </li>
            </ul>
        </div>
    </div>
    <!-----按鈕區END----->
</div>
</div>
</div>

<script language="javascript">
    //進入下一關
    var m6_next_model_a = false;
    var m6_next_model_b = false;
    function m6_goNextModel(){
        m6_next_model_b = true;
        var sendTalkData = {};
        sendTalkData.room_id = roomID;
        sendTalkData.com_dsc = 'web_m6_goNextModel';
        sendTalkData.user_type = userType;
        var json_data = JSON.stringify(sendTalkData);
        socket.emit('modelsComman', json_data);

        if(m6_next_model_a && m6_next_model_b){
            //紀錄動作
            var newOptionOBj =  $.extend(true,{}, option_obj);
            newOptionOBj.dataType = 'm6_goNextModel';//動作類型
            newOptionOBj.dataType_Dsc = '進入下一個模組';//動作類型敘述
            newOptionOBj.dataFunction = 'record_M6GoNextModel';//動作內容敘述
            newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
            newOptionOBj.dataFunction_Value = '';//動作內容敘述
            option_record.push(newOptionOBj);
            //紀錄動作 end
            get_NextModel();
        }
    }

    function web_m6_goNextModel(){
        if( getWebValue['user_type'] == '<?php echo ($model_data['userType'] == 'A')?'B':'A'; ?>'){
            m3_next_model_<?php echo ($model_data['userType'] == 'A')?'b':'a'; ?> = true;
        }
        if(m6_next_model_a && m6_next_model_b){
            //紀錄動作
            var newOptionOBj =  $.extend(true,{}, option_obj);
            newOptionOBj.dataType = 'm6_goNextModel';//動作類型
            newOptionOBj.dataType_Dsc = '進入下一個模組';//動作類型敘述
            newOptionOBj.dataFunction = 'record_M6GoNextModel';//動作內容敘述
            newOptionOBj.dataFunction_ObjID = '';//動作內容敘述
            newOptionOBj.dataFunction_Value = '';//動作內容敘述
            option_record.push(newOptionOBj);
            //紀錄動作 end
            get_NextModel();
        }
    }

    /**
     * 外部模組用來儲存操作動作的方法
     */
    function operating_record(getValue) {

    }
</script>