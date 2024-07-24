// document.addEventListener('DOMContentLoaded', function () {
//     // Lắng nghe sự kiện click trên nút xóa
//     document.querySelectorAll('.delete-btn').forEach(button => {
//         button.addEventListener('click', function () {
//             const form = this.closest('form'); // Tìm form gần nhất
//             if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
//                 // Nếu người dùng đồng ý, gửi yêu cầu DELETE
//                 fetch(form.action, {
//                     method: 'DELETE',
//                     headers: {
//                         'Content-Type': 'application/json',
//                         'X-CSRF-TOKEN': '{{ csrf_token() }}'
//                     }
//                 })
//                 .then(response => response.json())
//                 .then(data => {
//                     console.log(data);
//                     // Cập nhật giao diện người dùng nếu cần
//                     window.location.reload(); // Ví dụ: tải lại trang sau khi xóa
//                 })
//                 .catch(error => {
//                     console.error('Lỗi:', error);
//                 });
//             }
//         });
//     });
// });