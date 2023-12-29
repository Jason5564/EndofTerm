// JavaScript 文件

// 假設筆記的內容以物件形式存儲
let notes = [
    { id: 1, content: "" }, // 初始化內容為空字串
    { id: 2, content: "" }
];

// 顯示筆記列表
function displayNotes() {
    const notesList = document.getElementById('notes');
    notesList.innerHTML = '';

    notes.forEach(note => {
        const li = document.createElement('li');
        li.textContent = `筆記 ${note.id}`;

        li.classList.add('note-item'); // 新增 class

        const deleteBtn = document.createElement('button');
        deleteBtn.className = 'delete-note-btn';
        deleteBtn.textContent = '刪除';
        deleteBtn.onclick = () => deleteNoteById(note.id);

        const deleteBtnContainer = document.createElement('div');
        deleteBtnContainer.classList.add('delete-note-btn-container'); // 新增 class
        deleteBtnContainer.appendChild(deleteBtn);

        li.appendChild(deleteBtnContainer);
        li.onclick = () => {
            displayNoteContent(note); // 傳遞整個筆記對象
            editNoteId = note.id; // 儲存被點擊的筆記 ID
        };

        notesList.appendChild(li);
    });
}

// 顯示選擇的筆記內容
function displayNoteContent(note) {
    const noteContent = document.getElementById('noteContent');
    noteContent.innerHTML = ''; // 清空內容
    const textarea = document.createElement('textarea');
    textarea.value = note.content;
    textarea.rows = '20';
    textarea.cols = '80';
    textarea.style.fontSize = '16px'; // 設置文字大小
    textarea.style.color = 'black'; // 設置文字顏色
    textarea.id = 'noteTextarea'; // 添加 ID
    textarea.addEventListener('input', function() {
        updateNoteContent(note, this.value); // 傳遞整個筆記對象並更新內容
    });
    noteContent.appendChild(textarea);
}

// 更新筆記內容
function updateNoteContent(note, updatedContent) {
    note.content = updatedContent; // 更新特定筆記的內容
}

// 刪除特定 ID 的筆記
function deleteNoteById(id) {
    notes = notes.filter(note => note.id !== id);
    displayNotes();
    displayNoteContent({ id: null, content: "" }); // 清空右側筆記內容
}

// 更改文字大小
function changeFontSize() {
    const noteTextarea = document.getElementById('noteTextarea');
    const fontSizeSelect = document.getElementById('fontSize');
    noteTextarea.style.fontSize = fontSizeSelect.value;
}

// 更改文字顏色
function changeFontColor() {
    const noteTextarea = document.getElementById('noteTextarea');
    const fontColorSelect = document.getElementById('fontColor');
    noteTextarea.style.color = fontColorSelect.value;
}

// 新增筆記
function createNote() {
    const newNote = { id: notes.length + 1, content: '新的筆記內容' };
    notes.push(newNote);
    displayNotes();
}


// 初始化
let editNoteId = null; // 記錄被選中的筆記
displayNotes();
displayNoteContent('');
