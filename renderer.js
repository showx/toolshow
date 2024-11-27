// JSON 格式化
function formatJSON() {
    const input = document.getElementById('jsonInput').value;
    try {
        const parsed = JSON.parse(input);
        document.getElementById('jsonOutput').value = JSON.stringify(parsed, null, 2);
    } catch (error) {
        document.getElementById('jsonOutput').value = '无效的 JSON 格式: ' + error.message;
    }
}

// 生成随机密码
function generatePassword() {
    const length = document.getElementById('passwordLength').value;
    const includeNumbers = document.getElementById('includeNumbers').checked;
    const includeSymbols = document.getElementById('includeSymbols').checked;

    const letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const numbers = '0123456789';
    const symbols = '!@#$%^&*()_+-=[]{}|;:,.<>?';

    let chars = letters;
    if (includeNumbers) chars += numbers;
    if (includeSymbols) chars += symbols;

    let password = '';
    for (let i = 0; i < length; i++) {
        password += chars.charAt(Math.floor(Math.random() * chars.length));
    }

    document.getElementById('passwordOutput').value = password;
}

// 转换时间戳
function convertTimestamp() {
    const timestamp = document.getElementById('timestampInput').value;
    try {
        // 将秒转换为毫秒
        const date = new Date(parseInt(timestamp) * 1000);
        if (isNaN(date.getTime())) {
            throw new Error('无效时间戳');
        }
        document.getElementById('timestampOutput').value = date.toLocaleString('zh-CN', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false
        });
    } catch (error) {
        document.getElementById('timestampOutput').value = '无效的时间戳';
    }
}

// 页面加载完成后初始化
document.addEventListener('DOMContentLoaded', () => {
    // 设置当前时间戳
    const now = Math.floor(Date.now() / 1000); // 获取当前的Unix时间戳（秒）
    document.getElementById('timestampInput').value = now;
    convertTimestamp(); // 立即转换显示当前时间
}); 