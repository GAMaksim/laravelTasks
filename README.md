# 📚 Laravel Tasks - Full-Stack Web Application

<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" width="100">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.31.1-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.4.13-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind">
  <img src="https://img.shields.io/badge/SQLite-3.x-003B57?style=for-the-badge&logo=sqlite&logoColor=white" alt="SQLite">
</p>

<p align="center">
  <strong>Modern va professional Laravel web application - CRUD, Authentication, Authorization, Email, Queue, Search va boshqalar!</strong>
</p>

---

## 🎯 Loyiha haqida

**Laravel Tasks** - bu to'liq imkoniyatli web application bo'lib, Laravel framework ning barcha asosiy va ilg'or funksiyalarini o'z ichiga oladi. Loyiha 30 ta topshiriqni bajarish orqali yaratilgan va real proektlarda ishlatiladigan barcha zamonaviy texnologiyalarni qamrab oladi.

**Maqsad:** Laravel framework ni chuqur o'rganish va professional darajadagi portfolio loyihasi yaratish.

---

## ✨ Asosiy Funksiyalar

### 🔐 Authentication (Manual Implementation)
- ✅ User Registration (email validatsiya bilan)
- ✅ Login/Logout (session boshqaruvi)
- ✅ Password Hashing (bcrypt)
- ✅ Remember Me funksiyasi
- ✅ CSRF Protection

### 👥 Students Management (CRUD)
- ✅ Create - Yangi student qo'shish
- ✅ Read - Studentlar ro'yxati (pagination)
- ✅ Update - Student ma'lumotlarini yangilash
- ✅ Delete - Student o'chirish
- ✅ Validation (custom error messages)
- ✅ User relationship (har bir student yaratuvchiga tegishli)

### 📦 Products Management (CRUD)
- ✅ Full CRUD operations
- ✅ Factory & Seeder (test data generator)
- ✅ Category filtering
- ✅ Stock management
- ✅ Active/Inactive status

### 🔒 Authorization (Gates & Policies)
- ✅ Gate: `edit-student` (faqat o'z studentini tahrirlash)
- ✅ StudentPolicy (view, create, update, delete)
- ✅ @can directive (Blade views da)
- ✅ 403 Forbidden handling

### 📧 Email Notifications
- ✅ Mailtrap integration (test email)
- ✅ StudentPosted Mailable class
- ✅ HTML email templates (responsive)
- ✅ Dynamic content (create/update/delete events)

### ⚙️ Queue & Background Jobs
- ✅ Database queue driver
- ✅ StudentJob (log file yozish)
- ✅ Email queue (background processing)
- ✅ Queue worker (`php artisan queue:work`)
- ✅ Performance optimization (instant user response)

### 🔍 Search Functionality
- ✅ Students search (name, lastname, email)
- ✅ Products search (name, description, category)
- ✅ Query scope (`scopeSearch`)
- ✅ Results highlighting (yellow background)
- ✅ Empty state handling

### 🎨 Modern UI/UX
- ✅ Dashboard layout (sidebar + header)
- ✅ TailwindCSS (utility-first CSS)
- ✅ Alpine.js (dropdown, interactions)
- ✅ Responsive design (mobile, tablet, desktop)
- ✅ Blade components (reusable UI)
- ✅ Stats cards (dashboard)

### 🧪 Testing
- ✅ Feature Tests (PHPUnit)
- ✅ 6 tests for Products (14 assertions)
- ✅ Test coverage: Guest access, CRUD, Authorization

---

## 🛠️ Texnologiyalar

| Technology | Version | Purpose |
|------------|---------|---------|
| **Laravel** | 12.31.1 | Backend Framework |
| **PHP** | 8.4.13 | Programming Language |
| **SQLite** | 3.x | Database |
| **TailwindCSS** | 3.x (CDN) | Frontend Styling |
| **Alpine.js** | 3.x (CDN) | Lightweight JavaScript |
| **Mailtrap** | - | Email Testing |
| **PHPUnit** | 11.x | Testing Framework |

---

## 📂 Loyiha Strukturasi

```
laravelTasks/
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php          # Manual authentication
│   │   ├── StudentController.php       # Students CRUD
│   │   └── ProductController.php       # Products CRUD
│   ├── Models/
│   │   ├── User.php                    # User model (relationships)
│   │   ├── Student.php                 # Student model (search scope)
│   │   └── Product.php                 # Product model (scopes)
│   ├── Mail/
│   │   └── StudentPosted.php           # Email notification class
│   ├── Jobs/
│   │   └── StudentJob.php              # Background job (logging)
│   └── Policies/
│       └── StudentPolicy.php           # Authorization policy
│
├── database/
│   ├── migrations/                     # 15+ migrations
│   ├── factories/
│   │   └── ProductFactory.php          # Fake data generator
│   └── seeders/
│       └── ProductSeeder.php           # Database seeder
│
├── resources/views/
│   ├── components/
│   │   ├── dashboard-layout.blade.php  # Main layout
│   │   ├── sidebar.blade.php           # Navigation sidebar
│   │   ├── dashboard-header.blade.php  # Header with dropdown
│   │   ├── stat-card.blade.php         # Statistics cards
│   │   └── alert.blade.php             # Alert component
│   ├── students/                       # Students views (CRUD)
│   ├── products/                       # Products views (CRUD)
│   ├── auth/                           # Login/Register forms
│   └── emails/
│       └── student-posted.blade.php    # Email template
│
├── tests/Feature/
│   └── ProductTest.php                 # Feature tests (6 tests)
│
└── routes/web.php                      # Application routes
```

---

## 🚀 O'rnatish (Installation)

### 1. Repository ni clone qilish
```bash
git clone https://github.com/GAMaksim/laravelTasks.git
cd laravelTasks
```

### 2. Dependencies o'rnatish
```bash
composer install
```

### 3. Environment sozlash
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database yaratish va migrate qilish
```bash
touch database/database.sqlite
php artisan migrate
```

### 5. Test data qo'shish (ixtiyoriy)
```bash
php artisan db:seed --class=ProductSeeder
```

### 6. Serverni ishga tushirish
```bash
php artisan serve
```

Brauzerda oching: **http://127.0.0.1:8000**

---

## 🧪 Testing

Barcha testlarni ishga tushirish:
```bash
php artisan test
```

Faqat ProductTest:
```bash
php artisan test --filter=ProductTest
```

**Expected Output:**
```
PASS  Tests\Feature\ProductTest
✓ guests cannot access products
✓ authenticated users can view products
✓ user can create product
✓ user can only edit own products
✓ user can delete own product
✓ product requires name and price

Tests:  6 passed (14 assertions)
```

---

## ⚙️ Queue Worker (Background Jobs)

Email va log jobs ni background da ishlatish uchun:

```bash
php artisan queue:work
```

**Terminal ochiq turishi kerak!**

---

## 📧 Email Configuration (Mailtrap)

`.env` faylida:

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@laraveltasks.test"
MAIL_FROM_NAME="Laravel Tasks"
```

---

## 📊 Loyiha Statistikasi

| Metrik | Qiymat |
|--------|--------|
| **Tasks Completed** | 30/30 (100%) |
| **Total Lines of Code** | 3,500+ |
| **Git Commits** | 40+ |
| **Models** | 10+ |
| **Controllers** | 8+ |
| **Blade Views** | 25+ |
| **Migrations** | 15+ |
| **Feature Tests** | 6 (14 assertions) |
| **Components** | 10+ |
| **Development Time** | ~12-15 hours |

---

## 🎓 O'rganilgan Kontseptsiyalar

### Backend:
- ✅ MVC Architecture
- ✅ Eloquent ORM (Models, Relationships)
- ✅ Query Builder & Scopes
- ✅ Migrations & Schema
- ✅ Validation (Form Requests)
- ✅ Authorization (Gates & Policies)
- ✅ Authentication (Manual)
- ✅ Email Notifications
- ✅ Queue & Jobs
- ✅ Factories & Seeders

### Frontend:
- ✅ Blade Templates
- ✅ Component Architecture
- ✅ TailwindCSS (Utility-first)
- ✅ Alpine.js (Reactive)
- ✅ Responsive Design
- ✅ Form Handling

### Testing:
- ✅ Feature Tests
- ✅ PHPUnit
- ✅ Test Database
- ✅ Assertions

### Tools:
- ✅ Git & GitHub
- ✅ Composer
- ✅ Artisan CLI
- ✅ Mailtrap

---

## 🔑 Asosiy Routes

| URL | Method | Description |
|-----|--------|-------------|
| `/` | GET | Home page |
| `/register` | GET/POST | User registration |
| `/login` | GET/POST | User login |
| `/logout` | POST | User logout |
| `/dashboard` | GET | Dashboard (auth required) |
| `/students` | GET | Students list |
| `/students/create` | GET | Create student form |
| `/students/{id}` | GET | Student details |
| `/students/{id}/edit` | GET | Edit student form |
| `/products` | GET | Products list |
| `/products/create` | GET | Create product form |

---

## 🎯 Features Showcase

### 1️⃣ Dashboard
- Real-time statistics (Total Students, My Students, Total Users, Jobs in Queue)
- Recent students table
- Modern card-based design

### 2️⃣ Students Management
- Full CRUD with authorization
- Search functionality (name, lastname, email)
- Pagination (15 items per page)
- User-specific data (only see/edit own students)

### 3️⃣ Products Management
- Grid card layout
- Category filtering
- Stock tracking
- Active/Inactive status
- Search (name, description, category)

### 4️⃣ Email Notifications
- Automatic emails on student create/update/delete
- HTML templates with styling
- Background processing (Queue)

### 5️⃣ Testing
- Comprehensive test coverage
- Guest access protection
- CRUD operation tests
- Authorization tests
- Validation tests

---

## 🚀 Future Enhancements (Kelajakda qo'shish mumkin)

- [ ] Image upload (student/product photos)
- [ ] Export to Excel/PDF
- [ ] Advanced filtering (date range, etc.)
- [ ] REST API (JSON responses)
- [ ] Real-time notifications (Pusher/WebSockets)
- [ ] Multi-language support (i18n)
- [ ] User roles (Admin, Manager, User)
- [ ] Dashboard charts (statistics visualization)
- [ ] Email verification
- [ ] Password reset

---

## 📸 Screenshots

### Dashboard
![Dashboard](docs/screenshots/dashboard.png)

### Students List
![Students](docs/screenshots/students.png)

### Products Grid
![Products](docs/screenshots/products.png)

### Search Results
![Search](docs/screenshots/search.png)

**Note:** Screenshots papkasini yarating va screenshotlar qo'shing!

---

## 🤝 Contributing

Bu educational loyiha bo'lgani uchun contributions ochiq emas. Lekin fork qilishingiz va o'zingizning versiyangizni yaratishingiz mumkin!

---

## 📄 License

Bu loyiha o'quv maqsadlari uchun yaratilgan. Open-source (MIT License).

---

## 👨‍💻 Author

**Maksim Gavrilov**

- GitHub: [@GAMaksim](https://github.com/GAMaksim)
- Email: pokalenieshudes@gmail.com
- Project Link: [https://github.com/GAMaksim/laravelTasks](https://github.com/GAMaksim/laravelTasks)

---

## 🙏 Acknowledgments

- Laravel Framework - [laravel.com](https://laravel.com)
- TailwindCSS - [tailwindcss.com](https://tailwindcss.com)
- Mailtrap - [mailtrap.io](https://mailtrap.io)
- Laracasts - [laracasts.com](https://laracasts.com)

---

<p align="center">
  Made with ❤️ and ☕ by Maksim
</p>

<p align="center">
  <strong>⭐ Agar loyiha yoqsa, star bering! ⭐</strong>
</p>