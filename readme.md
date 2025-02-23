# VANILLA PHP MVC Blog System

A lightweight, pure PHP implementation of an MVC (Model-View-Controller) architecture blog system. This project demonstrates the power of vanilla PHP in creating a well-structured, maintainable, and secure web application without relying on external frameworks.

## 🚀 Features

### MVC Architecture

- **Models**: Handle database operations and business logic
- **Views**: Manage the presentation layer with clean separation of concerns
- **Controllers**: Process user requests and coordinate between Models and Views

### Advanced Routing System

- Custom router implementation supporting:
  - Dynamic route parameters
  - ID-based routing (`/posts/{id}`)
  - SEO-friendly slug routing (`/posts/{slug}`)
  - Automatic controller method mapping using `Controller@method` syntax
  - Fallback handling for 404 errors
  - URL normalization (handling trailing slashes)

### Security Features

- SQL injection prevention using PDO prepared statements
- XSS protection through proper HTML escaping
- Input validation and sanitization
- Secure database connection handling

### Database Integration

- PDO-based database abstraction layer
- MySQL support with easy configuration
- Extensible database model system

### View System

- Component-based view architecture
- View rendering with data injection
- Layout system with partial views support
- Dynamic content loading
- Reusable view components

### Post Management

- Full CRUD operations for blog posts
- Support for post metadata
- Image handling with JSON storage
- Slug-based URLs for SEO optimization
- Chronological post ordering

### Docker Integration

- Complete Docker development environment
- PHP 8.2 with Apache
- MySQL 5.7 database
- PHPMyAdmin for database management
- Environment variable configuration
- Network isolation

## 🛠 Technical Implementation

### Router Implementation

- Dynamic route parsing using regex patterns
- Parameter extraction for both numeric IDs and string slugs
- Automatic controller instantiation and method calling
- Clean URL support through Apache mod_rewrite

### Controller System

- Base controller with common functionality
- Specialized controllers for specific features
- Dynamic method calling based on route parameters
- Error handling and 404 management

### Model Layer

- Base Database class for connection management
- Model inheritance for specialized functionality
- Query building and execution
- Result set handling

### View Rendering

- Custom view renderer with data extraction
- Template inclusion system
- HTML escaping for security
- Support for nested views

## 🔧 Setup and Installation

1. Clone the repository
2. Copy `.env.example` to `.env` and configure your database settings
3. Run `docker-compose up -d` to start the development environment
4. Access the application at `http://localhost:8080`
5. PHPMyAdmin is available at `http://localhost:3006`

## 🌟 Key Technical Highlights

- Pure PHP implementation without external dependencies
- Modern PHP 8.2 features
- Docker-based development environment
- MVC pattern with strong Separation of Concerns (SoC)
- Secure by default with proper input/output handling
- Extensible and maintainable codebase
- SEO-friendly URL structure
- Component-based view system for reusability

## 🔐 Security Considerations

- All user inputs are properly sanitized
- Database queries use prepared statements
- HTML output is escaped to prevent XSS
- Secure configuration handling through environment variables
- Protected against common web vulnerabilities

## 🎯 Use Case

This project is perfect for:

- Learning MVC architecture in pure PHP
- Understanding routing and controller systems
- Implementing secure database operations
- Building component-based view systems
- Creating production-ready applications like:
  - Blog systems
  - E-commerce platforms
  - Custom MVC-based applications
- Docker-based PHP development
- Technical interviews and portfolio projects

## 📚 Requirements

- PHP 8.2+
- MySQL 5.7+
- Apache with mod_rewrite enabled
- Docker and Docker Compose (for development)

This project demonstrates professional-grade PHP development practices without relying on frameworks, making it an excellent showcase for technical interviews and portfolio presentations.
