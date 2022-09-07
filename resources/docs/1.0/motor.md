# Code Documentation

---

- [Motor](#section-1)

<a name="section-1">
## Motor
---

<larecipe-badge type="success" rounded>
Function sewa
</larecipe-badge>
---

<larecipe-badge type="warning" rounded>
Code berikut ini digunakan untuk mendapatkan nilai pada model sewa yang terkait dengan model motor
</larecipe-badge>

---

```
public function sewa()
{
    return $this->hasMany(Sewa::class, 'id_motor', 'id');
}
```

---