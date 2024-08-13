import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import axios from 'axios';

// idがcalendarのDOMを取得
var calendarEl = document.getElementById("calendar");

// カレンダーの設定
let calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin],

    // 最初に表示させる形式
    initialView: "dayGridMonth",

    // ヘッダーの設定（左/中央/右）
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "",
    },
    events: function (info, successCallback, failureCallback) {
        axios
            .post("/calendar/work_out_logs", {
                start_date: info.start.valueOf(),
                end_date: info.end.valueOf(),
            })
            .then(response => {
                console.log('data',response.data);
                // カレンダーに読み込み
                successCallback(response.data);
            })
            .catch(() => {
                // バリデーションエラーなど
                alert("取得に失敗しました");
            });
    },
});



// レンダリング
calendar.render();