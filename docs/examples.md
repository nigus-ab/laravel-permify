
---

## 📄 5. `docs/examples.md`

```md
# Usage Examples

## Assign Role and Permission

```php
$user->assignRole('editor');
$user->givePermissionTo('delete_post');

@permission('delete_post')
    <button>Delete</button>
@endpermission


---

### ✅ To Run the Docs Locally

1. Install Docsify globally (once):
```bash
npm install -g docsify-cli

docsify serve docs
