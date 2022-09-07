# Code Documentation

---

- [Sewa](#section-1)

<a name="section-1">
## Sewa
---

<larecipe-badge type="success" rounded>
Function motor
</larecipe-badge>
---

<larecipe-badge type="warning" rounded>
Code berikut ini digunakan untuk mendapatkan nilai pada model motor yang terkait dengan model sewa
</larecipe-badge>

---

```
public function motor()
{
    return $this->belongsTo(Motor::class, 'id_motor', 'id');
}
```

---