// JavaScript 文件

// 假設筆記的內容以物件形式存儲
let notes = [
    { id: 1, content: "" }, // 初始化內容為空字串
    { id: 2, content: "" }
];

// 新增筆記
function createNote() {
    const noteName = prompt("請輸入筆記名稱"); // 使用 prompt 提示输入框来输入笔记名称
    if (noteName) {
        const newNote = { id: notes.length + 1, name: noteName, content: '' }; // 存储笔记名称
        notes.push(newNote);
        displayNotes(); // 重新显示笔记列表
    }
}

// 顯示筆記列表
function displayNotes() {
    const notesList = document.getElementById('notes');
    notesList.innerHTML = '';

    notes.forEach(note => {
        const li = document.createElement('li');
        li.textContent = `${note.name || note.id}`; // 显示笔记名称

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


// 在更新筆記內容的函數中，使用 Local Storage 儲存內容
function updateNoteContent(note, updatedContent) {
    note.content = updatedContent; // 更新特定筆記的內容
    // 將內容存儲到 Local Storage
    localStorage.setItem('noteContent_' + note.id, updatedContent);
}

// 在顯示筆記內容的函數中，從 Local Storage 讀取內容
function displayNoteContent(note) {
    const noteContent = document.getElementById('noteContent');
    noteContent.innerHTML = ''; // 清空內容
    const textareaContainer = document.createElement('div');

    const textarea = document.createElement('textarea');
    textarea.rows = '20';
    textarea.cols = '80';
    textarea.style.fontSize = '16px'; // 初始化文字大小
    textarea.style.color = 'black'; // 初始化文字顏色
    textarea.value = localStorage.getItem('noteContent_' + note.id) || note.content; // 讀取 Local Storage 內容或使用筆記的內容

    textarea.addEventListener('input', function () {
        updateNoteContent(note, this.value); // 更新筆記內容並儲存到 Local Storage
    });

    const addTextBtn = document.createElement('button');
    addTextBtn.textContent = '新增文字';
    addTextBtn.onclick = addTextArea; // 點擊新增文字按鈕會再次新增 textarea

    const fontSizeSelect = document.createElement('select');
    fontSizeSelect.id = 'fontSize';
    fontSizeSelect.onchange = changeFontSize;
    const fontSizeOptions = ['12px', '16px', '20px'];
    fontSizeOptions.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option;
        optionElement.textContent = option;
        fontSizeSelect.appendChild(optionElement);
    });

    const fontColorSelect = document.createElement('select');
    fontColorSelect.id = 'fontColor';
    fontColorSelect.onchange = changeFontColor;
    const fontColorOptions = ['black', 'red', 'blue'];
    fontColorOptions.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option;
        optionElement.textContent = option;
        fontColorSelect.appendChild(optionElement);
    });

    textareaContainer.appendChild(textarea);
    textareaContainer.appendChild(addTextBtn);
    textareaContainer.appendChild(fontSizeSelect);
    textareaContainer.appendChild(fontColorSelect);
    noteContent.appendChild(textareaContainer);
}

// 刪除特定 ID 的筆記
function deleteNoteById(id) {
    notes = notes.filter(note => note.id !== id);
    displayNotes();
    displayNoteContent({ id: null, content: "" }); // 清空右側筆記內容
}

// 更改文字大小
function changeFontSize() {
    const noteContent = document.getElementById('noteContent');
    const fontSizeSelect = document.getElementById('fontSize');
    noteContent.querySelector('textarea').style.fontSize = fontSizeSelect.value;
}

// 更改文字顏色
function changeFontColor() {
    const noteContent = document.getElementById('noteContent');
    const fontColorSelect = document.getElementById('fontColor');
    noteContent.querySelector('textarea').style.color = fontColorSelect.value;
}

// 新增文字區域
function addTextArea() {
    const noteContent = document.getElementById('noteContent');
    const textareaContainer = document.createElement('div');

    const textarea = document.createElement('textarea');
    textarea.rows = '20';
    textarea.cols = '80';
    textarea.style.fontSize = '16px'; // 初始化文字大小
    textarea.style.color = 'black'; // 初始化文字顏色
    textarea.value = localStorage.getItem('tempNoteContent') || ''; // 从 Local Storage 获取内容

    textarea.addEventListener('input', function () {
        localStorage.setItem('tempNoteContent', this.value); // 将内容保存到 Local Storage
    });

    const addTextBtn = document.createElement('button');
    addTextBtn.textContent = '新增文字';
    addTextBtn.onclick = addTextArea; // 點擊新增文字按鈕會再次新增 textarea

    const deleteTextBtn = document.createElement('button');
    deleteTextBtn.textContent = '刪除文字';
    deleteTextBtn.style.backgroundColor = 'red'; // 設置背景色為紅色
    deleteTextBtn.onclick = function () {
        noteContent.removeChild(textareaContainer); // 刪除 textarea
        localStorage.removeItem('tempNoteContent'); // 移除 Local Storage 中的内容
    };

    const fontSizeSelect = document.createElement('select');
    fontSizeSelect.id = 'fontSize';
    fontSizeSelect.onchange = changeFontSize;
    const fontSizeOptions = ['12px', '16px', '20px'];
    fontSizeOptions.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option;
        optionElement.textContent = option;
        fontSizeSelect.appendChild(optionElement);
    });

    const fontColorSelect = document.createElement('select');
    fontColorSelect.id = 'fontColor';
    fontColorSelect.onchange = changeFontColor;
    const fontColorOptions = ['black', 'red', 'blue'];
    fontColorOptions.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option;
        optionElement.textContent = option;
        fontColorSelect.appendChild(optionElement);
    });

    textareaContainer.appendChild(textarea);
    textareaContainer.appendChild(addTextBtn);
    textareaContainer.appendChild(deleteTextBtn); // 將刪除文字按鈕加入 textarea 容器
    textareaContainer.appendChild(fontSizeSelect);
    textareaContainer.appendChild(fontColorSelect);
    noteContent.appendChild(textareaContainer);
}

// 初始化
let editNoteId = null; // 記錄被選中的筆記
displayNotes();
displayNoteContent('');
