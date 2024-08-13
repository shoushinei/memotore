<x-app-layout>
<div class="containers">
    <h2>{{ $exercise->name }}の記録</h2>
    <form action="{{ route('workoutlogs.store') }}" method="POST">
        @csrf
        <input type="hidden" name="exercise_id" value="{{ $exercise->id }}">

        <div id="sets">
            <div class="set" id="set-1">
                <h3>セット 1</h3>
                <div class="form-row">
                    <label for="weight_1">重さ：</label>
                    <input type="number" name="weights[]" id="weight_1" required> kg
                    <label for="reps_1" style="margin-left: 20px;">回数：</label>
                    <input type="number" name="reps[]" id="reps_1" required> 回
                </div>
                <div class="tags">
                    <!-- タグが追加された場合にここに表示されます -->
                </div>
                <a href="#" onclick="window.open('{{ route('tags.index', ['set' => 1]) }}', '_blank'); return false;" class="btn btn-secondary">+</a>
                <button type="button" class="removeSetButton">セットを削除</button>
            </div>
        </div>

        <button type="button" id="addSetButton">セットを追加</button>

        <div>
            <input type="hidden" name="log_date" value="{{ now() }}">
        </div>
        
        <button type="submit">記録する</button>
    </form>
</div>

<script>
    function addTagToSet(setNumber, tagName) {
    console.log('Add tag to set:', setNumber, tagName);
    const setContainer = document.querySelector(`#set-${setNumber}`);
    if (setContainer) {
        // タグ表示用の要素を作成
        const tagElement = document.createElement('span');
        tagElement.className = 'tag text-primary';
        tagElement.textContent = tagName;

        // タグ表示要素をセットコンテナに追加
        setContainer.appendChild(tagElement);

        // 隠しinputフィールドを追加し、フォームにタグ情報を送信できるようにする
        const tagInput = document.createElement('input');
        tagInput.type = 'hidden';
        tagInput.name = `tags[${setNumber}][]`; // 各セットに対応
        tagInput.value = tagName;
        setContainer.appendChild(tagInput);
    } else {
        console.error('Set container not found:', `#set-${setNumber}`);
    }
    }

    document.addEventListener('DOMContentLoaded', function() {
        let setCount = 1;
        function updateRemoveButtonVisibility() {
            const removeButtons = document.querySelectorAll('.removeSetButton');
            removeButtons.forEach((button, index) => {
                if (index === removeButtons.length - 1) {
                    button.style.display = 'inline-block';
                } else {
                    button.style.display = 'none';
                }
            });
        }
        document.getElementById('addSetButton').addEventListener('click', function() {
        setCount++;
        const newSet = document.createElement('div');
        newSet.classList.add('set');
        newSet.id = `set-${setCount}`;  // ここでセットにIDを付与
　　　　const tagUrl = "{{ route('tags.index', ['set' => '__SET__']) }}".replace('__SET__', setCount);
        newSet.innerHTML = `
        <h3>セット ${setCount}</h3>
        <div>
            <label for="weight_${setCount}">重さ</label>
            <input type="number" name="weights[]" id="weight_${setCount}" required>
        </div>
        <div>
            <label for="reps_${setCount}">回数</label>
            <input type="number" name="reps[]" id="reps_${setCount}" required>
        </div>
        <div class="tags" id="tags_${setCount}">
            <!-- タグが追加された場合にここに表示されます -->
        </div>
        <a href="#" onclick="window.open('${tagUrl}', '_blank'); return false;" class="btn btn-secondary">＋</a>
        <button type="button" class="removeSetButton">セットを削除</button>
    `;
        document.getElementById('sets').appendChild(newSet);
        updateRemoveButtonVisibility();
    });
        function attachRemoveSetHandlers() {
            document.getElementById('sets').addEventListener('click', function(event) {
                if (event.target.classList.contains('removeSetButton')) {
                    event.target.parentElement.remove();
                    setCount--;
                    updateRemoveButtonVisibility();
                }
            });
        }
        console.log(window.addTagToSet);
        attachRemoveSetHandlers();
        updateRemoveButtonVisibility();
    });
</script>
</x-app-layout>